    </main>

    <!-- Footer -->
    <footer class="bg-dark text-light py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5><i class="fas fa-spider text-warning"></i> TarantulaSMM Bénin</h5>
                    <p class="text-muted">
                        Votre partenaire de confiance pour booster votre présence sur les réseaux sociaux. 
                        Des services de qualité, rapides et sécurisés.
                    </p>
                    <div class="social-links">
                        <a href="#" class="text-warning me-3"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-warning me-3"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-warning me-3"><i class="fab fa-telegram fa-lg"></i></a>
                        <a href="#" class="text-warning"><i class="fab fa-whatsapp fa-lg"></i></a>
                    </div>
                </div>
                
                <div class="col-md-2 mb-4">
                    <h6>Navigation</h6>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="text-muted text-decoration-none">Accueil</a></li>
                        <li><a href="index.php?page=services" class="text-muted text-decoration-none">Services</a></li>
                        <li><a href="index.php?page=payment-info" class="text-muted text-decoration-none">Comment payer</a></li>
                        <li><a href="index.php?page=faq" class="text-muted text-decoration-none">FAQ</a></li>
                    </ul>
                </div>
                
                <div class="col-md-3 mb-4">
                    <h6>Paiements</h6>
                    <div class="payment-methods">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-mobile-alt text-warning me-2"></i>
                            <span class="text-muted">Moov Money</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-mobile-alt text-warning me-2"></i>
                            <span class="text-muted">MTN Mobile Money</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 mb-4">
                    <h6>Contact</h6>
                    <ul class="list-unstyled">
                        <li class="text-muted">
                            <i class="fas fa-envelope me-2"></i>
                            <?php echo SITE_EMAIL; ?>
                        </li>
                        <li class="text-muted">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            Cotonou, Bénin
                        </li>
                        <li class="text-muted">
                            <i class="fas fa-clock me-2"></i>
                            24h/24 - 7j/7
                        </li>
                    </ul>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="text-muted mb-0">
                        &copy; <?php echo date('Y'); ?> TarantulaSMM Bénin. Tous droits réservés.
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="index.php?page=policy" class="text-muted text-decoration-none me-3">
                        Politique de confidentialité
                    </a>
                    <a href="index.php?page=contact" class="text-muted text-decoration-none">
                        Support
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>