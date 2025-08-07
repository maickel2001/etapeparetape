<?php
$page_title = "Inscription";

// Si l'utilisateur est déjà connecté, redirection
if (is_logged_in()) {
    redirect('index.php?page=dashboard');
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = sanitize_input($_POST['first_name'] ?? '');
    $last_name = sanitize_input($_POST['last_name'] ?? '');
    $email = sanitize_input($_POST['email'] ?? '');
    $phone = sanitize_input($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    // Validation
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = 'Veuillez remplir tous les champs obligatoires.';
    } elseif (!validate_email($email)) {
        $error = 'Email invalide.';
    } elseif (!validate_password($password)) {
        $error = 'Le mot de passe doit contenir au moins ' . PASSWORD_MIN_LENGTH . ' caractères.';
    } elseif ($password !== $confirm_password) {
        $error = 'Les mots de passe ne correspondent pas.';
    } else {
        try {
            // Vérifier si l'email existe déjà
            $stmt = $db->query("SELECT id FROM users WHERE email = ?", [$email]);
            if ($stmt->fetch()) {
                $error = 'Cet email est déjà utilisé.';
            } else {
                // Créer l'utilisateur
                $hashed_password = hash_password($password);
                
                $stmt = $db->query(
                    "INSERT INTO users (first_name, last_name, email, phone, password) VALUES (?, ?, ?, ?, ?)",
                    [$first_name, $last_name, $email, $phone, $hashed_password]
                );
                
                if ($stmt) {
                    $user_id = $db->lastInsertId();
                    
                    // Connexion automatique
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['email'] = $email;
                    $_SESSION['first_name'] = $first_name;
                    $_SESSION['last_name'] = $last_name;
                    $_SESSION['is_admin'] = 0;
                    
                    // Email de bienvenue (optionnel)
                    try {
                        $subject = 'Bienvenue sur ' . SITE_NAME;
                        $message = "
                            <h2>Bienvenue sur " . SITE_NAME . " !</h2>
                            <p>Bonjour $first_name,</p>
                            <p>Votre compte a été créé avec succès. Vous pouvez maintenant commander nos services de boost pour vos réseaux sociaux.</p>
                            <p>Pour commencer, visitez notre page de services et choisissez ce qui vous convient le mieux.</p>
                            <br>
                            <p>L'équipe TarantulaSMM Bénin</p>
                        ";
                        send_email($email, $subject, $message);
                    } catch (Exception $e) {
                        // L'email échoue mais l'inscription continue
                    }
                    
                    flash_message('success', 'Inscription réussie ! Bienvenue sur TarantulaSMM Bénin.');
                    redirect('index.php?page=dashboard');
                }
            }
        } catch (Exception $e) {
            $error = 'Erreur lors de l\'inscription. Veuillez réessayer.';
            if (DEBUG_MODE) {
                $error .= ' ' . $e->getMessage();
            }
        }
    }
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <h3 class="card-title">
                            <i class="fas fa-spider text-primary-custom"></i>
                            Inscription
                        </h3>
                        <p class="text-muted">Créez votre compte TarantulaSMM gratuitement</p>
                    </div>
                    
                    <?php if ($error): ?>
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle"></i> <?php echo htmlspecialchars($error); ?>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($success): ?>
                    <div class="alert alert-success">
                        <i class="fas fa-check"></i> <?php echo htmlspecialchars($success); ?>
                    </div>
                    <?php endif; ?>
                    
                    <form method="POST" data-validate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name" class="form-label">
                                    <i class="fas fa-user"></i> Prénom *
                                </label>
                                <input type="text" class="form-control" id="first_name" name="first_name" 
                                       value="<?php echo htmlspecialchars($first_name ?? ''); ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name" class="form-label">
                                    <i class="fas fa-user"></i> Nom *
                                </label>
                                <input type="text" class="form-control" id="last_name" name="last_name" 
                                       value="<?php echo htmlspecialchars($last_name ?? ''); ?>" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope"></i> Email *
                            </label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label">
                                <i class="fas fa-phone"></i> Téléphone
                            </label>
                            <input type="tel" class="form-control" id="phone" name="phone" 
                                   value="<?php echo htmlspecialchars($phone ?? ''); ?>" 
                                   placeholder="+229 XX XX XX XX">
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock"></i> Mot de passe *
                                </label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <div class="form-text">Minimum <?php echo PASSWORD_MIN_LENGTH; ?> caractères</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="confirm_password" class="form-label">
                                    <i class="fas fa-lock"></i> Confirmer *
                                </label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="terms" required>
                            <label class="form-check-label" for="terms">
                                J'accepte les 
                                <a href="index.php?page=policy" target="_blank">conditions d'utilisation</a>
                                et la politique de confidentialité *
                            </label>
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="newsletter">
                            <label class="form-check-label" for="newsletter">
                                Je souhaite recevoir les offres promotionnelles par email
                            </label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 mb-3">
                            <i class="fas fa-user-plus"></i> Créer mon compte
                        </button>
                    </form>
                    
                    <div class="text-center">
                        <p>
                            Déjà un compte ? 
                            <a href="index.php?page=login" class="text-decoration-none fw-bold">
                                Se connecter
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Avantages de l'inscription -->
            <div class="row mt-4">
                <div class="col-md-4 text-center mb-3">
                    <div class="text-primary-custom mb-2">
                        <i class="fas fa-rocket fa-2x"></i>
                    </div>
                    <h6>Commandes Rapides</h6>
                    <small class="text-muted">Passez vos commandes en quelques clics</small>
                </div>
                <div class="col-md-4 text-center mb-3">
                    <div class="text-primary-custom mb-2">
                        <i class="fas fa-history fa-2x"></i>
                    </div>
                    <h6>Suivi Détaillé</h6>
                    <small class="text-muted">Suivez toutes vos commandes en temps réel</small>
                </div>
                <div class="col-md-4 text-center mb-3">
                    <div class="text-primary-custom mb-2">
                        <i class="fas fa-gift fa-2x"></i>
                    </div>
                    <h6>Offres Exclusives</h6>
                    <small class="text-muted">Accédez à des promotions spéciales</small>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Validation du mot de passe en temps réel
document.getElementById('confirm_password').addEventListener('input', function() {
    const password = document.getElementById('password').value;
    const confirmPassword = this.value;
    
    if (confirmPassword && password !== confirmPassword) {
        this.setCustomValidity('Les mots de passe ne correspondent pas');
    } else {
        this.setCustomValidity('');
    }
});
</script>