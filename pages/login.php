<?php
$page_title = "Connexion";

// Si l'utilisateur est déjà connecté, redirection
if (is_logged_in()) {
    redirect('index.php?page=dashboard');
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitize_input($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    
    // Validation
    if (empty($email) || empty($password)) {
        $error = 'Veuillez remplir tous les champs.';
    } elseif (!validate_email($email)) {
        $error = 'Email invalide.';
    } else {
        try {
            // Recherche de l'utilisateur
            $stmt = $db->query(
                "SELECT id, email, password, first_name, last_name, is_admin, is_active FROM users WHERE email = ?",
                [$email]
            );
            $user = $stmt->fetch();
            
            if ($user && verify_password($password, $user['password'])) {
                if ($user['is_active']) {
                    // Connexion réussie
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['first_name'] = $user['first_name'];
                    $_SESSION['last_name'] = $user['last_name'];
                    $_SESSION['is_admin'] = $user['is_admin'];
                    
                    flash_message('success', 'Connexion réussie ! Bienvenue ' . $user['first_name'] . '.');
                    
                    // Redirection selon le rôle
                    if ($user['is_admin']) {
                        redirect('admin/index.php');
                    } else {
                        redirect('index.php?page=dashboard');
                    }
                } else {
                    $error = 'Votre compte a été désactivé. Contactez l\'administrateur.';
                }
            } else {
                $error = 'Email ou mot de passe incorrect.';
            }
        } catch (Exception $e) {
            $error = 'Erreur lors de la connexion. Veuillez réessayer.';
            if (DEBUG_MODE) {
                $error .= ' ' . $e->getMessage();
            }
        }
    }
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <h3 class="card-title">
                            <i class="fas fa-spider text-primary-custom"></i>
                            Connexion
                        </h3>
                        <p class="text-muted">Accédez à votre compte TarantulaSMM</p>
                    </div>
                    
                    <?php if ($error): ?>
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle"></i> <?php echo htmlspecialchars($error); ?>
                    </div>
                    <?php endif; ?>
                    
                    <form method="POST" data-validate>
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope"></i> Email
                            </label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock"></i> Mot de passe
                            </label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">
                                Se souvenir de moi
                            </label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 mb-3">
                            <i class="fas fa-sign-in-alt"></i> Se connecter
                        </button>
                    </form>
                    
                    <div class="text-center">
                        <p class="mb-2">
                            <a href="#" class="text-decoration-none">Mot de passe oublié ?</a>
                        </p>
                        <p>
                            Pas encore de compte ? 
                            <a href="index.php?page=register" class="text-decoration-none fw-bold">
                                S'inscrire
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Informations de test -->
            <div class="card mt-4 border-warning">
                <div class="card-body bg-light">
                    <h6 class="card-title text-warning">
                        <i class="fas fa-info-circle"></i> Compte de test
                    </h6>
                    <p class="small mb-1"><strong>Admin:</strong> admin@tarantulasmm.bj</p>
                    <p class="small mb-0"><strong>Mot de passe:</strong> admin123</p>
                </div>
            </div>
        </div>
    </div>
</div>