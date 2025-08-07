<?php
// Fonctions utiles pour TarantulaSMM Bénin

// Fonction de nettoyage des données
function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Fonction de validation d'email
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Fonction de validation de mot de passe
function validate_password($password) {
    return strlen($password) >= PASSWORD_MIN_LENGTH;
}

// Fonction de hachage de mot de passe
function hash_password($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Fonction de vérification de mot de passe
function verify_password($password, $hash) {
    return password_verify($password, $hash);
}

// Fonction de génération de numéro de facture
function generate_invoice_number() {
    return 'INV-' . date('Y') . '-' . str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
}

// Fonction de formatage de prix
function format_price($price) {
    return number_format($price, 2, '.', ' ') . ' FCFA';
}

// Fonction de formatage de date
function format_date($date) {
    return date('d/m/Y à H:i', strtotime($date));
}

// Fonction de upload de fichier
function upload_file($file, $target_dir = 'proofs/') {
    if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK) {
        return ['success' => false, 'message' => 'Erreur lors de l\'upload du fichier.'];
    }
    
    // Vérification de la taille
    if ($file['size'] > MAX_FILE_SIZE) {
        return ['success' => false, 'message' => 'Le fichier est trop volumineux. Taille maximum : 5MB.'];
    }
    
    // Vérification de l'extension
    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($extension, ALLOWED_EXTENSIONS)) {
        return ['success' => false, 'message' => 'Type de fichier non autorisé. Extensions autorisées : ' . implode(', ', ALLOWED_EXTENSIONS)];
    }
    
    // Génération d'un nom unique
    $filename = uniqid() . '.' . $extension;
    $target_path = UPLOAD_PATH . $target_dir . $filename;
    
    // Création du dossier si nécessaire
    if (!file_exists(dirname($target_path))) {
        mkdir(dirname($target_path), 0755, true);
    }
    
    // Déplacement du fichier
    if (move_uploaded_file($file['tmp_name'], $target_path)) {
        return ['success' => true, 'filename' => $filename];
    } else {
        return ['success' => false, 'message' => 'Erreur lors de la sauvegarde du fichier.'];
    }
}

// Fonction d'envoi d'email
function send_email($to, $subject, $message, $is_html = true) {
    // Configuration basique - peut être remplacée par PHPMailer pour plus de fonctionnalités
    $headers = [
        'From: ' . SMTP_FROM_EMAIL,
        'Reply-To: ' . SMTP_FROM_EMAIL,
        'Content-Type: ' . ($is_html ? 'text/html' : 'text/plain') . '; charset=UTF-8'
    ];
    
    $success = mail($to, $subject, $message, implode("\r\n", $headers));
    
    // Log de l'email
    global $db;
    try {
        $db->query(
            "INSERT INTO email_logs (email, subject, message, status) VALUES (?, ?, ?, ?)",
            [$to, $subject, $message, $success ? 'sent' : 'failed']
        );
    } catch (Exception $e) {
        error_log("Erreur lors de l'enregistrement du log email : " . $e->getMessage());
    }
    
    return $success;
}

// Fonction pour obtenir les statistiques utilisateur
function get_user_stats($user_id) {
    global $db;
    
    $stats = [];
    
    // Nombre total de commandes
    $result = $db->query("SELECT COUNT(*) as total FROM orders WHERE user_id = ?", [$user_id]);
    $stats['total_orders'] = $result->fetch()['total'];
    
    // Montant total dépensé
    $result = $db->query("SELECT SUM(total_amount) as total FROM orders WHERE user_id = ? AND status IN ('completed', 'in_progress')", [$user_id]);
    $stats['total_spent'] = $result->fetch()['total'] ?? 0;
    
    // Service le plus commandé
    $result = $db->query("
        SELECT s.name, COUNT(*) as count 
        FROM orders o 
        JOIN services s ON o.service_id = s.id 
        WHERE o.user_id = ? 
        GROUP BY o.service_id 
        ORDER BY count DESC 
        LIMIT 1
    ", [$user_id]);
    $favorite = $result->fetch();
    $stats['favorite_service'] = $favorite ? $favorite['name'] : 'Aucun';
    
    return $stats;
}

// Fonction pour obtenir les statistiques admin
function get_admin_stats() {
    global $db;
    
    $stats = [];
    
    // Nombre total de commandes
    $result = $db->query("SELECT COUNT(*) as total FROM orders");
    $stats['total_orders'] = $result->fetch()['total'];
    
    // Revenus estimés
    $result = $db->query("SELECT SUM(total_amount) as total FROM orders WHERE status IN ('completed', 'in_progress')");
    $stats['total_revenue'] = $result->fetch()['total'] ?? 0;
    
    // Nombre d'utilisateurs
    $result = $db->query("SELECT COUNT(*) as total FROM users WHERE is_admin = 0");
    $stats['total_users'] = $result->fetch()['total'];
    
    // Commandes en attente
    $result = $db->query("SELECT COUNT(*) as total FROM orders WHERE status = 'pending'");
    $stats['pending_orders'] = $result->fetch()['total'];
    
    return $stats;
}

// Fonction pour vérifier si l'utilisateur est connecté
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

// Fonction pour vérifier si l'utilisateur est admin
function is_admin() {
    return isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1;
}

// Fonction pour rediriger
function redirect($url) {
    header("Location: $url");
    exit();
}

// Fonction pour afficher les messages flash
function flash_message($type, $message) {
    $_SESSION['flash_message'] = ['type' => $type, 'message' => $message];
}

function get_flash_message() {
    if (isset($_SESSION['flash_message'])) {
        $message = $_SESSION['flash_message'];
        unset($_SESSION['flash_message']);
        return $message;
    }
    return null;
}

// Fonction pour obtenir une configuration
function get_config($key, $default = '') {
    global $db;
    try {
        $result = $db->query("SELECT config_value FROM site_config WHERE config_key = ?", [$key]);
        $config = $result->fetch();
        return $config ? $config['config_value'] : $default;
    } catch (Exception $e) {
        return $default;
    }
}

// Fonction pour définir une configuration
function set_config($key, $value) {
    global $db;
    try {
        $db->query(
            "INSERT INTO site_config (config_key, config_value) VALUES (?, ?) 
             ON DUPLICATE KEY UPDATE config_value = ?",
            [$key, $value, $value]
        );
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>