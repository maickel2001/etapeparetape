<?php
$page_title = "Nos Services";
$page_description = "Découvrez tous nos services de boost pour vos réseaux sociaux - Instagram, Facebook, TikTok, YouTube et plus encore !";

// Récupération des catégories actives
try {
    $categories_stmt = $db->query("SELECT * FROM categories WHERE is_active = 1 ORDER BY sort_order, name");
    $categories = $categories_stmt->fetchAll();
} catch (Exception $e) {
    $categories = [];
}

// Récupération des services avec leur catégorie
try {
    $services_stmt = $db->query("
        SELECT s.*, c.name as category_name, c.icon as category_icon
        FROM services s 
        JOIN categories c ON s.category_id = c.id 
        WHERE s.is_active = 1 AND c.is_active = 1 
        ORDER BY c.sort_order, s.sort_order, s.name
    ");
    $services = $services_stmt->fetchAll();
} catch (Exception $e) {
    $services = [];
}

// Organiser les services par catégorie
$services_by_category = [];
foreach ($services as $service) {
    $services_by_category[$service['category_id']][] = $service;
}

// Catégorie sélectionnée (pour filtrage)
$selected_category = isset($_GET['category']) ? (int)$_GET['category'] : 0;
?>

<div class="container py-5">
    <!-- En-tête de la page -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="animate-on-scroll">
                <i class="fas fa-list text-primary-custom"></i>
                Nos Services
            </h1>
            <p class="lead text-muted animate-on-scroll">
                Boostez votre présence sur tous les réseaux sociaux avec nos services de qualité
            </p>
        </div>
    </div>

    <!-- Filtres par catégorie -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
                <a href="index.php?page=services" 
                   class="btn <?php echo $selected_category == 0 ? 'btn-primary' : 'btn-outline-primary'; ?> rounded-pill">
                    <i class="fas fa-globe"></i> Tous les services
                </a>
                <?php foreach ($categories as $category): ?>
                <a href="index.php?page=services&category=<?php echo $category['id']; ?>" 
                   class="btn <?php echo $selected_category == $category['id'] ? 'btn-primary' : 'btn-outline-primary'; ?> rounded-pill">
                    <i class="<?php echo htmlspecialchars($category['icon']); ?>"></i>
                    <?php echo htmlspecialchars($category['name']); ?>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php if ($selected_category == 0): ?>
        <!-- Affichage par catégories -->
        <?php foreach ($categories as $category): ?>
            <?php if (isset($services_by_category[$category['id']])): ?>
            <section class="mb-5 animate-on-scroll">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="d-flex align-items-center mb-3">
                            <div class="service-icon me-3">
                                <i class="<?php echo htmlspecialchars($category['icon']); ?>"></i>
                            </div>
                            <div>
                                <h2 class="mb-1"><?php echo htmlspecialchars($category['name']); ?></h2>
                                <?php if ($category['description']): ?>
                                <p class="text-muted mb-0"><?php echo htmlspecialchars($category['description']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php foreach ($services_by_category[$category['id']] as $service): ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="service-item h-100">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="mb-0"><?php echo htmlspecialchars($service['name']); ?></h5>
                                <span class="price-tag"><?php echo format_price($service['price']); ?></span>
                            </div>
                            
                            <?php if ($service['description']): ?>
                            <p class="text-muted mb-3"><?php echo htmlspecialchars($service['description']); ?></p>
                            <?php endif; ?>
                            
                            <div class="service-details mb-3">
                                <small class="text-muted">
                                    <i class="fas fa-chart-bar"></i>
                                    Quantité: <?php echo number_format($service['min_quantity']); ?> - <?php echo number_format($service['max_quantity']); ?>
                                </small>
                            </div>
                            
                            <div class="text-end">
                                <?php if (is_logged_in()): ?>
                                <a href="index.php?page=order&service=<?php echo $service['id']; ?>" 
                                   class="btn btn-primary btn-sm">
                                    <i class="fas fa-shopping-cart"></i> Commander
                                </a>
                                <?php else: ?>
                                <a href="index.php?page=login" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-sign-in-alt"></i> Se connecter
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <!-- Affichage d'une catégorie spécifique -->
        <?php 
        $current_category = null;
        foreach ($categories as $cat) {
            if ($cat['id'] == $selected_category) {
                $current_category = $cat;
                break;
            }
        }
        ?>
        
        <?php if ($current_category && isset($services_by_category[$selected_category])): ?>
        <section class="animate-on-scroll">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex align-items-center mb-3">
                        <div class="service-icon me-3">
                            <i class="<?php echo htmlspecialchars($current_category['icon']); ?>"></i>
                        </div>
                        <div>
                            <h2 class="mb-1"><?php echo htmlspecialchars($current_category['name']); ?></h2>
                            <?php if ($current_category['description']): ?>
                            <p class="text-muted mb-0"><?php echo htmlspecialchars($current_category['description']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php foreach ($services_by_category[$selected_category] as $service): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="service-item h-100">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h5 class="mb-0"><?php echo htmlspecialchars($service['name']); ?></h5>
                            <span class="price-tag"><?php echo format_price($service['price']); ?></span>
                        </div>
                        
                        <?php if ($service['description']): ?>
                        <p class="text-muted mb-3"><?php echo htmlspecialchars($service['description']); ?></p>
                        <?php endif; ?>
                        
                        <div class="service-details mb-3">
                            <small class="text-muted">
                                <i class="fas fa-chart-bar"></i>
                                Quantité: <?php echo number_format($service['min_quantity']); ?> - <?php echo number_format($service['max_quantity']); ?>
                            </small>
                        </div>
                        
                        <div class="text-end">
                            <?php if (is_logged_in()): ?>
                            <a href="index.php?page=order&service=<?php echo $service['id']; ?>" 
                               class="btn btn-primary btn-sm">
                                <i class="fas fa-shopping-cart"></i> Commander
                            </a>
                            <?php else: ?>
                            <a href="index.php?page=login" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-sign-in-alt"></i> Se connecter
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php else: ?>
        <div class="text-center py-5">
            <div class="text-muted mb-3">
                <i class="fas fa-inbox fa-3x"></i>
            </div>
            <h4>Aucun service disponible</h4>
            <p class="text-muted">Cette catégorie ne contient aucun service pour le moment.</p>
            <a href="index.php?page=services" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Voir tous les services
            </a>
        </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (empty($services)): ?>
    <div class="text-center py-5">
        <div class="text-muted mb-3">
            <i class="fas fa-tools fa-3x"></i>
        </div>
        <h4>Services en cours de préparation</h4>
        <p class="text-muted">Nos services seront bientôt disponibles. Revenez plus tard !</p>
        <a href="index.php" class="btn btn-primary">
            <i class="fas fa-home"></i> Retour à l'accueil
        </a>
    </div>
    <?php endif; ?>
</div>

<!-- Section CTA -->
<?php if (!empty($services)): ?>
<section class="py-5 bg-light">
    <div class="container text-center">
        <h3 class="mb-4">Prêt à booster vos réseaux sociaux ?</h3>
        <p class="lead text-muted mb-4">
            Commandez dès maintenant et voyez la différence en quelques heures !
        </p>
        <?php if (!is_logged_in()): ?>
        <a href="index.php?page=register" class="btn btn-primary btn-lg me-3">
            <i class="fas fa-user-plus"></i> S'inscrire maintenant
        </a>
        <a href="index.php?page=contact" class="btn btn-outline-primary btn-lg">
            <i class="fas fa-question-circle"></i> Poser une question
        </a>
        <?php else: ?>
        <a href="index.php?page=dashboard" class="btn btn-primary btn-lg me-3">
            <i class="fas fa-tachometer-alt"></i> Mon tableau de bord
        </a>
        <a href="index.php?page=contact" class="btn btn-outline-primary btn-lg">
            <i class="fas fa-headset"></i> Support client
        </a>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<script>
// Animation au scroll pour les éléments de service
document.addEventListener('DOMContentLoaded', function() {
    const serviceItems = document.querySelectorAll('.service-item');
    
    serviceItems.forEach((item, index) => {
        item.style.animationDelay = (index * 0.1) + 's';
        item.classList.add('animate-on-scroll');
    });
});
</script>