<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - ' : ''; ?><?php echo SITE_NAME; ?></title>
    <meta name="description" content="<?php echo isset($page_description) ? $page_description : 'Boostez vos réseaux sociaux avec TarantulaSMM Bénin - Services de qualité premium pour Instagram, Facebook, TikTok et plus encore !'; ?>">
    
    <!-- Favicon et Apple Touch Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
    
    <!-- Meta tags pour SEO et réseaux sociaux -->
    <meta name="keywords" content="SMM Panel, réseaux sociaux, Instagram, Facebook, TikTok, Bénin, followers, likes, vues">
    <meta name="author" content="TarantulaSMM Bénin">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SITE_URL; ?>">
    <meta property="og:title" content="<?php echo isset($page_title) ? $page_title . ' - ' : ''; ?><?php echo SITE_NAME; ?>">
    <meta property="og:description" content="<?php echo isset($page_description) ? $page_description : 'Boostez vos réseaux sociaux avec TarantulaSMM Bénin'; ?>">
    <meta property="og:image" content="<?php echo SITE_URL; ?>/assets/images/og-image.jpg">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo SITE_URL; ?>">
    <meta property="twitter:title" content="<?php echo isset($page_title) ? $page_title . ' - ' : ''; ?><?php echo SITE_NAME; ?>">
    <meta property="twitter:description" content="<?php echo isset($page_description) ? $page_description : 'Boostez vos réseaux sociaux avec TarantulaSMM Bénin'; ?>">
    <meta property="twitter:image" content="<?php echo SITE_URL; ?>/assets/images/og-image.jpg">
    
    <!-- Preconnect pour optimiser les performances -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous">
    
    <!-- CSS personnalisé -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- Theme color pour les navigateurs mobiles -->
    <meta name="theme-color" content="#667eea">
    <meta name="msapplication-TileColor" content="#667eea">
    
    <!-- Structured Data pour SEO -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "<?php echo SITE_NAME; ?>",
        "url": "<?php echo SITE_URL; ?>",
        "logo": "<?php echo SITE_URL; ?>/assets/images/logo.png",
        "description": "SMM Panel premium pour booster vos réseaux sociaux au Bénin",
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "BJ",
            "addressLocality": "Cotonou"
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "email": "<?php echo SITE_EMAIL; ?>",
            "contactType": "Customer Service"
        }
    }
    </script>
</head>
<body>
    <!-- Navigation ultra-moderne -->
    <nav class="navbar navbar-expand-lg fixed-top" id="mainNavbar">
        <div class="container">
            <!-- Brand avec animation -->
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-spider" data-aos="rotate-in"></i>
                <span>TarantulaSMM</span>
            </a>
            
            <!-- Bouton menu mobile avec animation -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon-custom">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>
            
            <!-- Menu principal -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Navigation gauche -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $page == 'home' ? 'active' : ''; ?>" href="index.php">
                            <i class="fas fa-home"></i>
                            <span>Accueil</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $page == 'services' ? 'active' : ''; ?>" href="index.php?page=services">
                            <i class="fas fa-list"></i>
                            <span>Services</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-info-circle"></i>
                            <span>Informations</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="index.php?page=payment-info">
                                <i class="fas fa-credit-card"></i> Comment payer
                            </a></li>
                            <li><a class="dropdown-item" href="index.php?page=faq">
                                <i class="fas fa-question-circle"></i> FAQ
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="index.php?page=contact">
                                <i class="fas fa-envelope"></i> Contact
                            </a></li>
                        </ul>
                    </li>
                </ul>
                
                <!-- Navigation droite -->
                <ul class="navbar-nav">
                    <?php if (is_logged_in()): ?>
                        <!-- Menu utilisateur connecté -->
                        <li class="nav-item me-2">
                            <a class="nav-link notification-bell" href="#" title="Notifications">
                                <i class="fas fa-bell"></i>
                                <span class="notification-badge">3</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle user-menu" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="user-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span class="user-name"><?php echo htmlspecialchars($_SESSION['first_name']); ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li class="dropdown-header">
                                    <div class="user-info">
                                        <strong><?php echo htmlspecialchars($_SESSION['first_name'] . ' ' . $_SESSION['last_name']); ?></strong>
                                        <small class="text-muted"><?php echo htmlspecialchars($_SESSION['email']); ?></small>
                                    </div>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="index.php?page=dashboard">
                                    <i class="fas fa-tachometer-alt"></i> Tableau de bord
                                </a></li>
                                <li><a class="dropdown-item" href="index.php?page=order">
                                    <i class="fas fa-shopping-cart"></i> Nouvelle commande
                                </a></li>
                                <li><a class="dropdown-item" href="#" onclick="toggleTheme()">
                                    <i class="fas fa-palette"></i> Changer le thème
                                </a></li>
                                <?php if (is_admin()): ?>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item admin-link" href="admin/index.php">
                                    <i class="fas fa-cog"></i> Administration
                                </a></li>
                                <?php endif; ?>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="logout.php">
                                    <i class="fas fa-sign-out-alt"></i> Déconnexion
                                </a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <!-- Menu utilisateur non connecté -->
                        <li class="nav-item">
                            <a class="nav-link <?php echo $page == 'login' ? 'active' : ''; ?>" href="index.php?page=login">
                                <i class="fas fa-sign-in-alt"></i>
                                <span>Connexion</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary nav-cta" href="index.php?page=register">
                                <i class="fas fa-rocket"></i>
                                <span>Commencer</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main class="main-content">
        <!-- Messages flash avec animation -->
        <?php
        $flash = get_flash_message();
        if ($flash):
        ?>
        <div class="flash-message-container">
            <div class="container">
                <div class="alert alert-<?php echo $flash['type'] == 'error' ? 'danger' : $flash['type']; ?> alert-dismissible fade show flash-alert" role="alert">
                    <div class="alert-content">
                        <i class="fas fa-<?php echo $flash['type'] == 'success' ? 'check-circle' : ($flash['type'] == 'error' ? 'exclamation-triangle' : 'info-circle'); ?>"></i>
                        <span><?php echo htmlspecialchars($flash['message']); ?></span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Progress bar de navigation (optionnel) -->
        <div class="scroll-progress" id="scrollProgress"></div>

    <!-- Styles additionnels pour la navigation -->
    <style>
        /* Menu toggler personnalisé */
        .navbar-toggler-icon-custom {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 24px;
            height: 24px;
            cursor: pointer;
        }

        .navbar-toggler-icon-custom span {
            display: block;
            width: 20px;
            height: 2px;
            background: var(--primary-color);
            margin: 2px 0;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon-custom span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon-custom span:nth-child(2) {
            opacity: 0;
        }

        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon-custom span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -6px);
        }

        /* CTA button dans la navbar */
        .nav-cta {
            margin-left: 1rem;
            padding: 0.5rem 1.5rem !important;
            border-radius: 50px !important;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .nav-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        /* Avatar utilisateur */
        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-right: 0.5rem;
            font-size: 0.9rem;
        }

        .user-menu {
            display: flex;
            align-items: center;
            padding: 0.5rem 1rem !important;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .user-menu:hover {
            background: var(--bg-glass);
        }

        .user-name {
            font-weight: 500;
        }

        /* Notification bell */
        .notification-bell {
            position: relative;
            padding: 0.75rem !important;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .notification-bell:hover {
            background: var(--bg-glass);
            transform: scale(1.1);
        }

        .notification-badge {
            position: absolute;
            top: 0.25rem;
            right: 0.25rem;
            background: #ff4757;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(255, 71, 87, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(255, 71, 87, 0); }
            100% { box-shadow: 0 0 0 0 rgba(255, 71, 87, 0); }
        }

        /* Dropdown amélioré */
        .dropdown-header .user-info {
            padding: 0.5rem 0;
        }

        .admin-link {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            border-radius: 8px;
            margin: 0.25rem;
        }

        /* Flash messages */
        .flash-message-container {
            position: fixed;
            top: 80px;
            left: 0;
            right: 0;
            z-index: 9999;
            pointer-events: none;
        }

        .flash-alert {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            pointer-events: auto;
            animation: slideInDown 0.5s ease-out;
        }

        @keyframes slideInDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .alert-content {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .alert-content i {
            font-size: 1.25rem;
        }

        /* Scroll progress */
        .scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: var(--primary-gradient);
            z-index: 9999;
            transition: width 0.1s ease;
        }

        /* Dark mode toggle */
        .theme-toggle {
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .theme-toggle:hover {
            transform: rotate(180deg);
        }
    </style>

    <!-- Script pour la navigation -->
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNavbar');
            const scrollProgress = document.getElementById('scrollProgress');
            
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
            
            // Scroll progress
            const scrolled = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
            scrollProgress.style.width = scrolled + '%';
        });

        // Theme toggle
        function toggleTheme() {
            document.body.classList.toggle('dark-theme');
            localStorage.setItem('theme', document.body.classList.contains('dark-theme') ? 'dark' : 'light');
        }

        // Load saved theme
        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark') {
                document.body.classList.add('dark-theme');
            }
        });

        // Auto-close flash messages
        document.addEventListener('DOMContentLoaded', function() {
            const flashAlert = document.querySelector('.flash-alert');
            if (flashAlert) {
                setTimeout(() => {
                    flashAlert.classList.remove('show');
                    setTimeout(() => flashAlert.remove(), 300);
                }, 5000);
            }
        });
    </script>