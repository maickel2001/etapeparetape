<?php
$page_title = "Page non trouvée";
http_response_code(404);
?>

<div class="container py-5">
    <div class="row justify-content-center text-center">
        <div class="col-lg-6">
            <div class="error-page">
                <div class="error-number text-primary-custom mb-4" style="font-size: 8rem; font-weight: 700;">
                    404
                </div>
                <h2 class="mb-4">Page non trouvée</h2>
                <p class="lead text-muted mb-4">
                    Oops ! La page que vous cherchez semble avoir disparu dans la toile...
                </p>
                <div class="error-icon mb-4">
                    <i class="fas fa-spider text-primary-custom" style="font-size: 4rem;"></i>
                </div>
                <div class="error-actions">
                    <a href="index.php" class="btn btn-primary btn-lg me-3">
                        <i class="fas fa-home"></i> Retour à l'accueil
                    </a>
                    <a href="index.php?page=services" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-list"></i> Voir nos services
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>