<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - ' : ''; ?><?php echo SITE_NAME; ?></title>
    <meta name="description" content="<?php echo isset($page_description) ? $page_description : 'Boostez vos réseaux sociaux avec TarantulaSMM Bénin - Services de qualité pour Instagram, Facebook, TikTok et plus encore !'; ?>">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- CSS personnalisé -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <i class="fas fa-spider text-warning"></i>
                TarantulaSMM
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $page == 'home' ? 'active' : ''; ?>" href="index.php">
                            <i class="fas fa-home"></i> Accueil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $page == 'services' ? 'active' : ''; ?>" href="index.php?page=services">
                            <i class="fas fa-list"></i> Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $page == 'payment-info' ? 'active' : ''; ?>" href="index.php?page=payment-info">
                            <i class="fas fa-credit-card"></i> Comment payer
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $page == 'faq' ? 'active' : ''; ?>" href="index.php?page=faq">
                            <i class="fas fa-question-circle"></i> FAQ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $page == 'contact' ? 'active' : ''; ?>" href="index.php?page=contact">
                            <i class="fas fa-envelope"></i> Contact
                        </a>
                    </li>
                </ul>
                
                <ul class="navbar-nav">
                    <?php if (is_logged_in()): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user"></i> 
                                <?php echo htmlspecialchars($_SESSION['first_name']); ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?page=dashboard">
                                    <i class="fas fa-tachometer-alt"></i> Tableau de bord
                                </a></li>
                                <?php if (is_admin()): ?>
                                <li><a class="dropdown-item" href="admin/index.php">
                                    <i class="fas fa-cog"></i> Administration
                                </a></li>
                                <?php endif; ?>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt"></i> Déconnexion
                                </a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $page == 'login' ? 'active' : ''; ?>" href="index.php?page=login">
                                <i class="fas fa-sign-in-alt"></i> Connexion
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $page == 'register' ? 'active' : ''; ?>" href="index.php?page=register">
                                <i class="fas fa-user-plus"></i> Inscription
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main class="main-content">
        <?php
        // Affichage des messages flash
        $flash = get_flash_message();
        if ($flash):
        ?>
        <div class="container mt-3">
            <div class="alert alert-<?php echo $flash['type'] == 'error' ? 'danger' : $flash['type']; ?> alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($flash['message']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
        <?php endif; ?>