<?php
// Configuration générale du site
define('SITE_NAME', 'TarantulaSMM Bénin');
define('SITE_URL', 'http://localhost'); // Modifier selon l'environnement
define('SITE_EMAIL', 'contact@tarantulasmm.bj');

// Configuration Mobile Money
define('MOOV_NUMBER', '+229 XX XX XX XX'); // À configurer
define('MTN_NUMBER', '+229 XX XX XX XX');  // À configurer

// Configuration upload
define('MAX_FILE_SIZE', 5 * 1024 * 1024); // 5MB
define('ALLOWED_EXTENSIONS', ['jpg', 'jpeg', 'png', 'pdf']);
define('UPLOAD_PATH', 'assets/uploads/');

// Configuration email SMTP
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', ''); // À configurer
define('SMTP_PASSWORD', ''); // À configurer
define('SMTP_FROM_EMAIL', SITE_EMAIL);
define('SMTP_FROM_NAME', SITE_NAME);

// Configuration sécurité
define('PASSWORD_MIN_LENGTH', 6);
define('SESSION_TIMEOUT', 3600); // 1 heure

// Configuration des statuts de commande
define('ORDER_STATUS', [
    'pending' => 'En attente',
    'payment_verified' => 'Paiement vérifié',
    'in_progress' => 'En cours',
    'completed' => 'Terminé',
    'cancelled' => 'Annulé',
    'payment_rejected' => 'Paiement rejeté'
]);

// Fuseau horaire
date_default_timezone_set('Africa/Porto-Novo');

// Configuration de debug (désactiver en production)
define('DEBUG_MODE', true);
if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}
?>