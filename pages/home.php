<?php
$page_title = "Accueil";
$page_description = "Boostez vos réseaux sociaux avec TarantulaSMM Bénin - Services de qualité pour Instagram, Facebook, TikTok et plus encore !";

// Récupération des statistiques
try {
    $admin_stats = get_admin_stats();
} catch (Exception $e) {
    $admin_stats = ['total_orders' => 0, 'total_revenue' => 0, 'total_users' => 0];
}
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 animate-on-scroll">
                <h1 class="text-white">
                    <i class="fas fa-spider text-warning"></i>
                    Boostez vos <span class="text-warning">Réseaux Sociaux</span>
                </h1>
                <p class="lead text-light">
                    TarantulaSMM Bénin vous propose des services de qualité pour augmenter votre présence sur 
                    Instagram, Facebook, TikTok et bien plus. Rapide, sécurisé et abordable !
                </p>
                <div class="hero-buttons">
                    <a href="index.php?page=services" class="btn btn-primary btn-lg me-3">
                        <i class="fas fa-rocket"></i> Voir nos services
                    </a>
                    <?php if (!is_logged_in()): ?>
                    <a href="index.php?page=register" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-user-plus"></i> S'inscrire
                    </a>
                    <?php else: ?>
                    <a href="index.php?page=dashboard" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-tachometer-alt"></i> Mon tableau de bord
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6 text-center animate-on-scroll">
                <div class="hero-image">
                    <i class="fas fa-chart-line" style="font-size: 15rem; color: rgba(255, 193, 7, 0.1);"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Statistiques -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-4 animate-on-scroll">
                <div class="card stats-card h-100">
                    <div class="card-body">
                        <div class="stats-number"><?php echo number_format($admin_stats['total_orders']); ?>+</div>
                        <h5><i class="fas fa-shopping-cart text-primary-custom"></i> Commandes Réalisées</h5>
                        <p class="text-muted">Clients satisfaits dans tout le Bénin</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 animate-on-scroll">
                <div class="card stats-card h-100">
                    <div class="card-body">
                        <div class="stats-number"><?php echo number_format($admin_stats['total_users']); ?>+</div>
                        <h5><i class="fas fa-users text-primary-custom"></i> Utilisateurs Actifs</h5>
                        <p class="text-muted">Une communauté grandissante</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 animate-on-scroll">
                <div class="card stats-card h-100">
                    <div class="card-body">
                        <div class="stats-number">24/7</div>
                        <h5><i class="fas fa-clock text-primary-custom"></i> Support Disponible</h5>
                        <p class="text-muted">Assistance continue pour nos clients</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Services Populaires -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="animate-on-scroll">Nos Services les Plus Populaires</h2>
                <p class="lead text-muted animate-on-scroll">Découvrez nos services les plus demandés</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4 mb-4 animate-on-scroll">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="service-icon">
                            <i class="fab fa-instagram text-gradient"></i>
                        </div>
                        <h5>Instagram Boost</h5>
                        <p class="text-muted">Followers, likes, vues et commentaires pour votre compte Instagram</p>
                        <div class="price-tag">À partir de 2 000 FCFA</div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4 animate-on-scroll">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="service-icon">
                            <i class="fab fa-facebook text-gradient"></i>
                        </div>
                        <h5>Facebook Marketing</h5>
                        <p class="text-muted">Augmentez votre visibilité sur Facebook avec nos services professionnels</p>
                        <div class="price-tag">À partir de 3 000 FCFA</div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4 animate-on-scroll">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="service-icon">
                            <i class="fab fa-tiktok text-gradient"></i>
                        </div>
                        <h5>TikTok Viral</h5>
                        <p class="text-muted">Rendez vos vidéos TikTok virales avec plus de vues et de followers</p>
                        <div class="price-tag">À partir de 1 500 FCFA</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <a href="index.php?page=services" class="btn btn-primary btn-lg">
                <i class="fas fa-eye"></i> Voir tous nos services
            </a>
        </div>
    </div>
</section>

<!-- Section Avantages -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="animate-on-scroll">Pourquoi Choisir TarantulaSMM ?</h2>
                <p class="lead text-muted animate-on-scroll">Nous nous distinguons par notre qualité et notre engagement</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-4 animate-on-scroll">
                <div class="text-center">
                    <div class="service-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h5>Livraison Rapide</h5>
                    <p class="text-muted">Commandes traitées dans les 24h maximum</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4 animate-on-scroll">
                <div class="text-center">
                    <div class="service-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h5>Sécurisé</h5>
                    <p class="text-muted">Vos données et comptes sont en sécurité</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4 animate-on-scroll">
                <div class="text-center">
                    <div class="service-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h5>Paiement Local</h5>
                    <p class="text-muted">Moov Money et MTN Mobile Money acceptés</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4 animate-on-scroll">
                <div class="text-center">
                    <div class="service-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h5>Support 24/7</h5>
                    <p class="text-muted">Assistance disponible à tout moment</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Comment ça marche -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="animate-on-scroll">Comment ça marche ?</h2>
                <p class="lead text-muted animate-on-scroll">Un processus simple en 4 étapes</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-4 text-center animate-on-scroll">
                <div class="position-relative">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; font-size: 2rem; font-weight: bold;">
                        1
                    </div>
                    <h5 class="mt-3">Inscription</h5>
                    <p class="text-muted">Créez votre compte gratuitement</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4 text-center animate-on-scroll">
                <div class="position-relative">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; font-size: 2rem; font-weight: bold;">
                        2
                    </div>
                    <h5 class="mt-3">Choisir</h5>
                    <p class="text-muted">Sélectionnez le service souhaité</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4 text-center animate-on-scroll">
                <div class="position-relative">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; font-size: 2rem; font-weight: bold;">
                        3
                    </div>
                    <h5 class="mt-3">Payer</h5>
                    <p class="text-muted">Payez via Mobile Money</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4 text-center animate-on-scroll">
                <div class="position-relative">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; font-size: 2rem; font-weight: bold;">
                        4
                    </div>
                    <h5 class="mt-3">Recevoir</h5>
                    <p class="text-muted">Votre commande est livrée rapidement</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section CTA Final -->
<section class="py-5 bg-dark text-white">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8 animate-on-scroll">
                <h2 class="mb-4">Prêt à Booster vos Réseaux Sociaux ?</h2>
                <p class="lead mb-4">
                    Rejoignez des milliers de créateurs de contenu qui font confiance à TarantulaSMM pour développer leur présence en ligne.
                </p>
                <?php if (!is_logged_in()): ?>
                <a href="index.php?page=register" class="btn btn-primary btn-lg me-3">
                    <i class="fas fa-rocket"></i> Commencer maintenant
                </a>
                <a href="index.php?page=contact" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-envelope"></i> Nous contacter
                </a>
                <?php else: ?>
                <a href="index.php?page=services" class="btn btn-primary btn-lg me-3">
                    <i class="fas fa-shopping-cart"></i> Passer une commande
                </a>
                <a href="index.php?page=dashboard" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-tachometer-alt"></i> Mon compte
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>