// TarantulaSMM Bénin - JavaScript principal

// Initialisation au chargement de la page
document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
});

function initializeApp() {
    // Initialiser les animations
    initAnimations();
    
    // Initialiser les uploads de fichier
    initFileUploads();
    
    // Initialiser les formulaires
    initForms();
    
    // Initialiser les tooltips
    initTooltips();
    
    // Initialiser le calculateur de prix
    initPriceCalculator();
}

// Animations d'apparition
function initAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in-up');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observer tous les éléments avec la classe 'animate-on-scroll'
    document.querySelectorAll('.animate-on-scroll').forEach(el => {
        observer.observe(el);
    });
}

// Gestion des uploads de fichier
function initFileUploads() {
    const uploadAreas = document.querySelectorAll('.upload-area');
    
    uploadAreas.forEach(area => {
        const input = area.querySelector('input[type="file"]');
        const text = area.querySelector('.upload-text');
        const originalText = text.textContent;
        
        // Clic sur la zone
        area.addEventListener('click', () => input.click());
        
        // Drag & Drop
        area.addEventListener('dragover', (e) => {
            e.preventDefault();
            area.classList.add('dragover');
        });
        
        area.addEventListener('dragleave', () => {
            area.classList.remove('dragover');
        });
        
        area.addEventListener('drop', (e) => {
            e.preventDefault();
            area.classList.remove('dragover');
            
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                input.files = files;
                updateUploadText(text, files[0], originalText);
            }
        });
        
        // Changement de fichier
        input.addEventListener('change', (e) => {
            if (e.target.files.length > 0) {
                updateUploadText(text, e.target.files[0], originalText);
            }
        });
    });
}

function updateUploadText(textElement, file, originalText) {
    const maxSize = 5 * 1024 * 1024; // 5MB
    const allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
    
    if (file.size > maxSize) {
        textElement.innerHTML = '<i class="fas fa-exclamation-triangle text-danger"></i> Fichier trop volumineux (max 5MB)';
        return;
    }
    
    if (!allowedTypes.includes(file.type)) {
        textElement.innerHTML = '<i class="fas fa-exclamation-triangle text-danger"></i> Type de fichier non autorisé';
        return;
    }
    
    textElement.innerHTML = `<i class="fas fa-check text-success"></i> ${file.name} (${formatFileSize(file.size)})`;
}

function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

// Initialisation des formulaires
function initForms() {
    // Validation en temps réel
    const forms = document.querySelectorAll('form[data-validate]');
    
    forms.forEach(form => {
        const inputs = form.querySelectorAll('input, textarea, select');
        
        inputs.forEach(input => {
            input.addEventListener('blur', () => validateField(input));
            input.addEventListener('input', () => clearFieldError(input));
        });
        
        form.addEventListener('submit', (e) => {
            if (!validateForm(form)) {
                e.preventDefault();
            }
        });
    });
}

function validateField(field) {
    const value = field.value.trim();
    let isValid = true;
    let message = '';
    
    // Validation selon le type
    switch(field.type) {
        case 'email':
            isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
            message = 'Email invalide';
            break;
        case 'password':
            isValid = value.length >= 6;
            message = 'Mot de passe trop court (min 6 caractères)';
            break;
        case 'url':
            isValid = /^https?:\/\/.+/.test(value);
            message = 'URL invalide (doit commencer par http:// ou https://)';
            break;
    }
    
    // Champs obligatoires
    if (field.hasAttribute('required') && !value) {
        isValid = false;
        message = 'Ce champ est obligatoire';
    }
    
    // Affichage du résultat
    if (!isValid) {
        showFieldError(field, message);
    } else {
        clearFieldError(field);
    }
    
    return isValid;
}

function showFieldError(field, message) {
    clearFieldError(field);
    
    field.classList.add('is-invalid');
    
    const errorDiv = document.createElement('div');
    errorDiv.className = 'invalid-feedback';
    errorDiv.textContent = message;
    
    field.parentNode.appendChild(errorDiv);
}

function clearFieldError(field) {
    field.classList.remove('is-invalid');
    
    const errorDiv = field.parentNode.querySelector('.invalid-feedback');
    if (errorDiv) {
        errorDiv.remove();
    }
}

function validateForm(form) {
    const fields = form.querySelectorAll('input, textarea, select');
    let isValid = true;
    
    fields.forEach(field => {
        if (!validateField(field)) {
            isValid = false;
        }
    });
    
    return isValid;
}

// Calculateur de prix
function initPriceCalculator() {
    const serviceSelect = document.getElementById('service_id');
    const quantityInput = document.getElementById('quantity');
    const totalDisplay = document.getElementById('total-amount');
    
    if (serviceSelect && quantityInput && totalDisplay) {
        function calculateTotal() {
            const selectedOption = serviceSelect.options[serviceSelect.selectedIndex];
            const price = parseFloat(selectedOption.dataset.price || 0);
            const quantity = parseInt(quantityInput.value) || 0;
            const total = price * quantity;
            
            totalDisplay.textContent = formatPrice(total);
            
            // Validation des limites
            const minQty = parseInt(selectedOption.dataset.minQuantity || 1);
            const maxQty = parseInt(selectedOption.dataset.maxQuantity || 999999);
            
            if (quantity < minQty || quantity > maxQty) {
                quantityInput.setCustomValidity(`Quantité doit être entre ${minQty} et ${maxQty}`);
            } else {
                quantityInput.setCustomValidity('');
            }
        }
        
        serviceSelect.addEventListener('change', calculateTotal);
        quantityInput.addEventListener('input', calculateTotal);
        
        // Calcul initial
        calculateTotal();
    }
}

function formatPrice(amount) {
    return new Intl.NumberFormat('fr-FR', {
        style: 'currency',
        currency: 'XOF',
        minimumFractionDigits: 0,
        maximumFractionDigits: 2
    }).format(amount).replace('XOF', 'FCFA');
}

// Tooltips Bootstrap
function initTooltips() {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
}

// Fonction pour afficher des notifications
function showNotification(message, type = 'info') {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type} alert-dismissible fade show position-fixed top-0 end-0 m-3`;
    alertDiv.style.zIndex = '9999';
    alertDiv.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    document.body.appendChild(alertDiv);
    
    // Auto-suppression après 5 secondes
    setTimeout(() => {
        if (alertDiv.parentNode) {
            alertDiv.remove();
        }
    }, 5000);
}

// Fonction pour confirmer une action
function confirmAction(message, callback) {
    if (confirm(message)) {
        callback();
    }
}

// Fonction pour charger du contenu en AJAX
function loadContent(url, targetElement, showLoader = true) {
    if (showLoader) {
        targetElement.innerHTML = '<div class="text-center p-4"><div class="spinner"></div> Chargement...</div>';
    }
    
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Erreur réseau');
            }
            return response.text();
        })
        .then(html => {
            targetElement.innerHTML = html;
            // Réinitialiser les fonctionnalités après le chargement
            initializeApp();
        })
        .catch(error => {
            targetElement.innerHTML = '<div class="alert alert-danger">Erreur lors du chargement du contenu.</div>';
            console.error('Erreur:', error);
        });
}

// Fonction pour soumettre un formulaire en AJAX
function submitFormAjax(form, successCallback) {
    const formData = new FormData(form);
    
    fetch(form.action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            if (successCallback) {
                successCallback(data);
            } else {
                showNotification(data.message, 'success');
            }
        } else {
            showNotification(data.message, 'danger');
        }
    })
    .catch(error => {
        showNotification('Erreur lors de l\'envoi du formulaire.', 'danger');
        console.error('Erreur:', error);
    });
}

// Fonctions utilitaires
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// Gestionnaire global d'erreurs
window.addEventListener('error', function(e) {
    console.error('Erreur JavaScript:', e.error);
    if (typeof showNotification === 'function') {
        showNotification('Une erreur inattendue s\'est produite.', 'warning');
    }
});

// Export des fonctions pour utilisation globale
window.TarantulaApp = {
    showNotification,
    confirmAction,
    loadContent,
    submitFormAjax,
    formatPrice,
    debounce,
    throttle
};