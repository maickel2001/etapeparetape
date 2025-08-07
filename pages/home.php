<?php
$page_title = "Accueil";
$page_description = "Boostez vos réseaux sociaux avec TarantulaSMM Bénin - Services premium de qualité professionnelle pour Instagram, Facebook, TikTok et plus encore !";

// Récupération des statistiques
try {
    $admin_stats = get_admin_stats();
} catch (Exception $e) {
    $admin_stats = ['total_orders' => 2847, 'total_revenue' => 4250000, 'total_users' => 1205];
}
?>

<!-- Hero Section Révolutionnaire -->
<section class="hero">
    <!-- Éléments flottants animés -->
    <div class="hero-floating">
        <i class="fab fa-instagram fa-3x"></i>
    </div>
    <div class="hero-floating">
        <i class="fab fa-facebook fa-2x"></i>
    </div>
    <div class="hero-floating">
        <i class="fab fa-tiktok fa-4x"></i>
    </div>
    
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6 hero-content">
                <div class="hero-badge animate-on-scroll" data-delay="0">
                    <i class="fas fa-star"></i>
                    <span>Leader au Bénin</span>
                </div>
                
                <h1 class="hero-title animate-on-scroll" data-delay="100">
                    Transformez votre
                    <span class="gradient-text">présence digitale</span>
                </h1>
                
                <p class="hero-subtitle animate-on-scroll" data-delay="200">
                    TarantulaSMM révolutionne votre stratégie social media avec des services premium, 
                    des résultats garantis et une expertise locale inégalée.
                </p>
                
                <div class="hero-features animate-on-scroll" data-delay="300">
                    <div class="hero-feature">
                        <i class="fas fa-bolt"></i>
                        <span>Livraison instantanée</span>
                    </div>
                    <div class="hero-feature">
                        <i class="fas fa-shield-check"></i>
                        <span>100% sécurisé</span>
                    </div>
                    <div class="hero-feature">
                        <i class="fas fa-mobile-alt"></i>
                        <span>Mobile Money</span>
                    </div>
                </div>
                
                <div class="hero-buttons animate-on-scroll" data-delay="400">
                    <?php if (!is_logged_in()): ?>
                    <a href="index.php?page=register" class="btn btn-primary btn-lg hero-cta">
                        <span>Commencer maintenant</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="index.php?page=services" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-play"></i>
                        <span>Découvrir nos services</span>
                    </a>
                    <?php else: ?>
                    <a href="index.php?page=services" class="btn btn-primary btn-lg hero-cta">
                        <span>Passer une commande</span>
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                    <a href="index.php?page=dashboard" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Mon tableau de bord</span>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="col-lg-6 hero-visual">
                <div class="hero-device animate-on-scroll" data-delay="500">
                    <div class="device-frame">
                        <div class="device-screen">
                            <div class="app-interface">
                                <div class="app-header">
                                    <div class="app-title">TarantulaSMM</div>
                                    <div class="app-status online">En ligne</div>
                                </div>
                                <div class="stats-grid">
                                    <div class="stat-item">
                                        <div class="stat-number">2.8K+</div>
                                        <div class="stat-label">Commandes</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-number">1.2K+</div>
                                        <div class="stat-label">Clients</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-number">99.9%</div>
                                        <div class="stat-label">Satisfaction</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-number">24/7</div>
                                        <div class="stat-label">Support</div>
                                    </div>
                                </div>
                                <div class="social-icons">
                                    <i class="fab fa-instagram"></i>
                                    <i class="fab fa-facebook"></i>
                                    <i class="fab fa-tiktok"></i>
                                    <i class="fab fa-youtube"></i>
                                    <i class="fab fa-twitter"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll indicator -->
    <div class="scroll-indicator animate-on-scroll" data-delay="600">
        <div class="scroll-text">Scroll pour découvrir</div>
        <div class="scroll-arrow">
            <i class="fas fa-chevron-down"></i>
        </div>
    </div>
</section>

<!-- Section Statistiques Premium -->
<section class="section stats-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title animate-on-scroll">
                    Ils nous font confiance
                </h2>
                <p class="section-subtitle animate-on-scroll">
                    Des milliers de créateurs boosted leur succès avec TarantulaSMM
                </p>
            </div>
        </div>
        
        <div class="row stats-grid">
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-card animate-on-scroll hover-lift" data-delay="0">
                    <div class="stat-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <div class="stat-number" data-count="<?php echo $admin_stats['total_orders']; ?>">0</div>
                    <div class="stat-label">Commandes réalisées</div>
                    <div class="stat-growth">
                        <i class="fas fa-arrow-up"></i>
                        <span>+18% ce mois</span>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-card animate-on-scroll hover-lift" data-delay="100">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number" data-count="<?php echo $admin_stats['total_users']; ?>">0</div>
                    <div class="stat-label">Créateurs actifs</div>
                    <div class="stat-growth">
                        <i class="fas fa-arrow-up"></i>
                        <span>+25% ce mois</span>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-card animate-on-scroll hover-lift" data-delay="200">
                    <div class="stat-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="stat-number" data-count="99">0</div>
                    <div class="stat-label">Satisfaction client (%)</div>
                    <div class="stat-growth">
                        <i class="fas fa-arrow-up"></i>
                        <span>Excellent</span>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-card animate-on-scroll hover-lift" data-delay="300">
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-number" data-count="24">0</div>
                    <div class="stat-label">Support disponible (h)</div>
                    <div class="stat-growth">
                        <i class="fas fa-check"></i>
                        <span>7j/7</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Services Premium -->
<section class="section services-section section-alt">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title animate-on-scroll">
                    Services ultra-performants
                </h2>
                <p class="section-subtitle animate-on-scroll">
                    Chaque plateforme, chaque besoin, une solution premium
                </p>
            </div>
        </div>
        
        <div class="row services-grid">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-card animate-on-scroll hover-glow" data-delay="0">
                    <div class="service-header">
                        <div class="service-icon instagram">
                            <i class="fab fa-instagram"></i>
                        </div>
                        <h3>Instagram Pro</h3>
                    </div>
                    <div class="service-content">
                        <p>Followers authentiques, engagement réel, stories vues. Boostez votre influence Instagram.</p>
                        <ul class="service-features">
                            <li><i class="fas fa-check"></i> Followers de qualité</li>
                            <li><i class="fas fa-check"></i> Likes organiques</li>
                            <li><i class="fas fa-check"></i> Vues stories & reels</li>
                            <li><i class="fas fa-check"></i> Commentaires engagés</li>
                        </ul>
                        <div class="service-price">
                            <span class="price-from">À partir de</span>
                            <span class="price-amount">2 000 FCFA</span>
                        </div>
                    </div>
                    <div class="service-footer">
                        <a href="index.php?page=services&category=1" class="btn btn-primary service-btn">
                            <span>Explorer Instagram</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-card animate-on-scroll hover-glow featured" data-delay="100">
                    <div class="featured-badge">
                        <i class="fas fa-crown"></i>
                        <span>Populaire</span>
                    </div>
                    <div class="service-header">
                        <div class="service-icon tiktok">
                            <i class="fab fa-tiktok"></i>
                        </div>
                        <h3>TikTok Viral</h3>
                    </div>
                    <div class="service-content">
                        <p>Devenez viral sur TikTok avec des vues massives et un engagement naturel.</p>
                        <ul class="service-features">
                            <li><i class="fas fa-check"></i> Vues ultra-rapides</li>
                            <li><i class="fas fa-check"></i> Followers actifs</li>
                            <li><i class="fas fa-check"></i> Likes automatiques</li>
                            <li><i class="fas fa-check"></i> Partages organiques</li>
                        </ul>
                        <div class="service-price">
                            <span class="price-from">À partir de</span>
                            <span class="price-amount">1 500 FCFA</span>
                        </div>
                    </div>
                    <div class="service-footer">
                        <a href="index.php?page=services&category=3" class="btn btn-primary service-btn">
                            <span>Devenir viral</span>
                            <i class="fas fa-fire"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-card animate-on-scroll hover-glow" data-delay="200">
                    <div class="service-header">
                        <div class="service-icon facebook">
                            <i class="fab fa-facebook"></i>
                        </div>
                        <h3>Facebook Business</h3>
                    </div>
                    <div class="service-content">
                        <p>Développez votre business Facebook avec des fans engagés et des vues ciblées.</p>
                        <ul class="service-features">
                            <li><i class="fas fa-check"></i> Pages likes business</li>
                            <li><i class="fas fa-check"></i> Vues vidéos ciblées</li>
                            <li><i class="fas fa-check"></i> Partages naturels</li>
                            <li><i class="fas fa-check"></i> Engagement local</li>
                        </ul>
                        <div class="service-price">
                            <span class="price-from">À partir de</span>
                            <span class="price-amount">3 000 FCFA</span>
                        </div>
                    </div>
                    <div class="service-footer">
                        <a href="index.php?page=services&category=2" class="btn btn-primary service-btn">
                            <span>Booster Facebook</span>
                            <i class="fas fa-chart-line"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="index.php?page=services" class="btn btn-outline-primary btn-lg">
                <span>Voir tous nos services</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Section Processus -->
<section class="section process-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title animate-on-scroll">
                    Un processus simplifié
                </h2>
                <p class="section-subtitle animate-on-scroll">
                    De l'idée aux résultats en 4 étapes simples
                </p>
            </div>
        </div>
        
        <div class="process-timeline">
            <div class="process-step animate-on-scroll" data-delay="0">
                <div class="process-number">01</div>
                <div class="process-content">
                    <h3>Choisissez</h3>
                    <p>Sélectionnez le service parfait pour vos besoins parmi notre catalogue premium.</p>
                </div>
                <div class="process-icon">
                    <i class="fas fa-mouse-pointer"></i>
                </div>
            </div>
            
            <div class="process-step animate-on-scroll" data-delay="100">
                <div class="process-number">02</div>
                <div class="process-content">
                    <h3>Configurez</h3>
                    <p>Personnalisez votre commande avec la quantité et les options qui vous conviennent.</p>
                </div>
                <div class="process-icon">
                    <i class="fas fa-cogs"></i>
                </div>
            </div>
            
            <div class="process-step animate-on-scroll" data-delay="200">
                <div class="process-number">03</div>
                <div class="process-content">
                    <h3>Payez</h3>
                    <p>Réglez facilement via Mobile Money et envoyez votre preuve de paiement.</p>
                </div>
                <div class="process-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
            </div>
            
            <div class="process-step animate-on-scroll" data-delay="300">
                <div class="process-number">04</div>
                <div class="process-content">
                    <h3>Profitez</h3>
                    <p>Votre commande est traitée instantanément. Regardez votre audience grandir !</p>
                </div>
                <div class="process-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section CTA Finale -->
<section class="section cta-section">
    <div class="container">
        <div class="cta-card animate-on-scroll">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="cta-title">
                        Prêt à révolutionner votre présence digitale ?
                    </h2>
                    <p class="cta-subtitle">
                        Rejoignez des milliers de créateurs qui ont transformé leur succès avec TarantulaSMM. 
                        Commencez votre ascension dès aujourd'hui.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <?php if (!is_logged_in()): ?>
                    <a href="index.php?page=register" class="btn btn-primary btn-lg cta-btn">
                        <span>Commencer gratuitement</span>
                        <i class="fas fa-rocket"></i>
                    </a>
                    <?php else: ?>
                    <a href="index.php?page=services" class="btn btn-primary btn-lg cta-btn">
                        <span>Passer commande</span>
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Styles spécifiques à la homepage -->
<style>
/* Hero Badge */
.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    padding: 0.5rem 1rem;
    border-radius: 50px;
    color: white;
    font-size: 0.9rem;
    font-weight: 500;
    margin-bottom: 1.5rem;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.hero-badge i {
    color: #ffd700;
}

/* Hero Title */
.hero-title {
    font-size: clamp(2.5rem, 6vw, 4.5rem);
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 1.5rem;
    color: white;
}

.gradient-text {
    background: linear-gradient(135deg, #ffd700, #ff6b6b);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-subtitle {
    font-size: 1.25rem;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 2rem;
    line-height: 1.6;
    max-width: 600px;
}

/* Hero Features */
.hero-features {
    display: flex;
    gap: 2rem;
    margin-bottom: 2.5rem;
    flex-wrap: wrap;
}

.hero-feature {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: rgba(255, 255, 255, 0.9);
    font-weight: 500;
}

.hero-feature i {
    color: #ffd700;
}

/* Hero CTA */
.hero-cta {
    position: relative;
    overflow: hidden;
}

.hero-cta::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s ease;
}

.hero-cta:hover::after {
    left: 100%;
}

/* Device Mockup */
.hero-device {
    position: relative;
    max-width: 400px;
    margin: 0 auto;
}

.device-frame {
    background: linear-gradient(145deg, #2d3748, #4a5568);
    border-radius: 30px;
    padding: 20px;
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3);
    position: relative;
}

.device-frame::before {
    content: '';
    position: absolute;
    top: 15px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 4px;
    background: #1a202c;
    border-radius: 2px;
}

.device-screen {
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 20px;
    padding: 30px 20px;
    position: relative;
    overflow: hidden;
}

.app-interface {
    color: white;
}

.app-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.app-title {
    font-size: 1.5rem;
    font-weight: 700;
}

.app-status {
    background: rgba(255, 255, 255, 0.2);
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.8rem;
}

.app-status.online::before {
    content: '';
    display: inline-block;
    width: 8px;
    height: 8px;
    background: #10b981;
    border-radius: 50%;
    margin-right: 0.5rem;
}

.stats-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-bottom: 30px;
}

.stat-item {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    padding: 15px;
    text-align: center;
}

.stat-number {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 0.25rem;
}

.stat-label {
    font-size: 0.8rem;
    opacity: 0.8;
}

.social-icons {
    display: flex;
    justify-content: center;
    gap: 15px;
}

.social-icons i {
    font-size: 1.5rem;
    opacity: 0.7;
    transition: all 0.3s ease;
}

.social-icons i:hover {
    opacity: 1;
    transform: scale(1.2);
}

/* Scroll Indicator */
.scroll-indicator {
    position: absolute;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    color: rgba(255, 255, 255, 0.7);
}

.scroll-text {
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
}

.scroll-arrow {
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(-10px); }
    60% { transform: translateY(-5px); }
}

/* Sections */
.section {
    padding: 6rem 0;
}

.section-title {
    font-size: clamp(2rem, 4vw, 3.5rem);
    font-weight: 700;
    margin-bottom: 1rem;
}

.section-subtitle {
    font-size: 1.25rem;
    color: var(--text-secondary);
    max-width: 600px;
    margin: 0 auto;
}

/* Stats Cards */
.stat-card {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    padding: 2rem;
    text-align: center;
    height: 100%;
    transition: all 0.4s ease;
}

.stat-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(102, 126, 234, 0.15);
}

.stat-icon {
    width: 60px;
    height: 60px;
    background: var(--primary-gradient);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: white;
    font-size: 1.5rem;
}

.stat-number {
    font-size: 3rem;
    font-weight: 800;
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    line-height: 1;
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
}

.stat-growth {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.25rem;
    color: #10b981;
    font-size: 0.9rem;
    font-weight: 500;
}

/* Service Cards */
.service-card {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 24px;
    padding: 0;
    height: 100%;
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

.service-card.featured {
    border: 2px solid var(--primary-color);
    transform: scale(1.05);
}

.featured-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    background: var(--primary-gradient);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.25rem;
    z-index: 2;
}

.service-header {
    padding: 2rem 2rem 1rem;
    text-align: center;
}

.service-icon {
    width: 80px;
    height: 80px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: white;
    font-size: 2rem;
}

.service-icon.instagram {
    background: linear-gradient(135deg, #e1306c, #fd1d1d, #f77737, #fcaf45);
}

.service-icon.tiktok {
    background: linear-gradient(135deg, #000000, #ff0050);
}

.service-icon.facebook {
    background: linear-gradient(135deg, #1877f2, #42a5f5);
}

.service-content {
    padding: 0 2rem 1rem;
}

.service-features {
    list-style: none;
    padding: 0;
    margin: 1.5rem 0;
}

.service-features li {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 0.5rem;
    font-size: 0.95rem;
}

.service-features i {
    color: #10b981;
    font-size: 0.8rem;
}

.service-price {
    text-align: center;
    margin: 1.5rem 0;
}

.price-from {
    display: block;
    font-size: 0.9rem;
    color: var(--text-secondary);
}

.price-amount {
    font-size: 1.5rem;
    font-weight: 700;
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.service-footer {
    padding: 1rem 2rem 2rem;
}

.service-btn {
    width: 100%;
    justify-content: space-between;
}

/* Process Timeline */
.process-timeline {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

.process-step {
    text-align: center;
    position: relative;
}

.process-number {
    width: 60px;
    height: 60px;
    background: var(--primary-gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    font-weight: 700;
    margin: 0 auto 1.5rem;
}

.process-icon {
    position: absolute;
    top: -10px;
    right: calc(50% - 45px);
    width: 30px;
    height: 30px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-color);
    font-size: 0.8rem;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* CTA Section */
.cta-section {
    background: var(--primary-gradient);
}

.cta-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 24px;
    padding: 3rem;
    color: white;
}

.cta-title {
    font-size: clamp(1.75rem, 3vw, 2.5rem);
    font-weight: 700;
    margin-bottom: 1rem;
    color: white;
}

.cta-subtitle {
    font-size: 1.125rem;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 0;
}

.cta-btn {
    background: white;
    color: var(--primary-color);
    border: none;
    font-weight: 700;
}

.cta-btn:hover {
    background: rgba(255, 255, 255, 0.9);
    color: var(--primary-color);
    transform: translateY(-3px);
}

/* Animations */
.animate-on-scroll {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.animate-on-scroll.animated {
    opacity: 1;
    transform: translateY(0);
}

/* Counter Animation */
@keyframes countUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.counting {
    animation: countUp 0.5s ease-out;
}
</style>

<!-- Scripts pour animations -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation au scroll
    const animateElements = document.querySelectorAll('.animate-on-scroll');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const delay = entry.target.dataset.delay || 0;
                setTimeout(() => {
                    entry.target.classList.add('animated');
                }, delay);
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    animateElements.forEach(el => observer.observe(el));

    // Animation des compteurs
    const counters = document.querySelectorAll('.stat-number[data-count]');
    const countObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.dataset.count);
                let current = 0;
                const increment = target / 100;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    counter.textContent = Math.floor(current).toLocaleString();
                    counter.classList.add('counting');
                }, 20);
                countObserver.unobserve(counter);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => countObserver.observe(counter));
});
</script>