# 🕷️ TarantulaSMM Bénin

Un SMM Panel (Social Media Marketing Panel) complet et responsive pour vendre des services de boost de réseaux sociaux au Bénin, avec paiement Mobile Money (Moov/MTN) et gestion des preuves de paiement.

## ✨ Fonctionnalités

### 👤 Côté Utilisateur
- ✅ Page d'accueil attractive avec statistiques en temps réel
- ✅ Système d'inscription et connexion sécurisé
- ✅ Catalogue de services organisé par catégories avec icônes Font Awesome
- ⏳ Système de commande avec upload de preuves de paiement
- ⏳ Tableau de bord utilisateur avec historique et statistiques
- ⏳ Notifications email automatiques
- ⏳ Génération de factures PDF
- ⏳ Système de support par tickets

### 🔐 Côté Admin
- ⏳ Dashboard avec statistiques globales
- ⏳ Gestion complète des commandes et preuves de paiement
- ⏳ Gestion des services et catégories
- ⏳ Gestion des utilisateurs
- ⏳ Configuration dynamique (numéros Mobile Money, SMTP)
- ⏳ Panel d'administration complet

### 🛠️ Technologie
- **Frontend:** HTML5, CSS3, Bootstrap 5, JavaScript (ES6+)
- **Backend:** PHP 7+
- **Base de données:** MySQL
- **Design:** Responsive, moderne avec animations
- **Icons:** Font Awesome 6
- **Paiements:** Moov Money, MTN Mobile Money

## 📦 Installation

### Prérequis
- PHP 7.4 ou supérieur
- MySQL 5.7 ou supérieur
- Serveur web (Apache/Nginx)
- Extension PHP : PDO, PDO_MySQL

### Étapes d'installation

1. **Cloner le projet**
   ```bash
   git clone <repository-url>
   cd tarantulasmm-benin
   ```

2. **Configuration de la base de données**
   - Créer une base de données MySQL
   - Importer le fichier `sql/create_database.sql`
   ```sql
   mysql -u username -p database_name < sql/create_database.sql
   ```

3. **Configuration du projet**
   - Modifier `config/database.php` avec vos paramètres de BDD
   - Modifier `config/config.php` pour ajuster les configurations

4. **Configuration des permissions**
   ```bash
   chmod 755 assets/uploads/
   chmod 755 assets/uploads/proofs/
   chmod 755 assets/uploads/invoices/
   ```

5. **Configuration du serveur web**
   - Pointer le DocumentRoot vers le dossier du projet
   - Activer les URL rewrites si nécessaire

## 🚀 Utilisation

### Comptes par défaut
- **Admin:** admin@tarantulasmm.bj / admin123

### Structure du projet
```
/
├── config/                 # Configuration
│   ├── database.php       # Connexion BDD
│   └── config.php         # Configuration générale
├── includes/              # Fichiers inclus
│   ├── header.php         # En-tête du site
│   ├── footer.php         # Pied de page
│   └── functions.php      # Fonctions utilitaires
├── pages/                 # Pages du site
│   ├── home.php          # Page d'accueil
│   ├── login.php         # Connexion
│   ├── register.php      # Inscription
│   ├── services.php      # Liste des services
│   └── ...
├── admin/                 # Panel d'administration
├── assets/                # Ressources statiques
│   ├── css/              # Feuilles de style
│   ├── js/               # Scripts JavaScript
│   ├── images/           # Images
│   └── uploads/          # Fichiers uploadés
└── sql/                   # Scripts SQL
```

### Configuration Mobile Money

Modifier dans `config/config.php` ou via l'admin :
```php
define('MOOV_NUMBER', '+229 XX XX XX XX');
define('MTN_NUMBER', '+229 XX XX XX XX');
```

### Configuration Email

Pour les notifications automatiques :
```php
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'votre@email.com');
define('SMTP_PASSWORD', 'motdepasse');
```

## 🎨 Personnalisation

### Couleurs et styles
Modifier `assets/css/style.css` - Variables CSS disponibles :
```css
:root {
    --primary-color: #ffc107;
    --secondary-color: #212529;
    --accent-color: #28a745;
    /* ... */
}
```

### Ajouter des services
1. Se connecter en admin
2. Aller dans "Gestion des services"
3. Créer/modifier catégories et services

## 🔧 API et Extensions

### Structure des tables principales
- `users` - Utilisateurs
- `categories` - Catégories de services
- `services` - Services disponibles
- `orders` - Commandes
- `support_tickets` - Tickets de support
- `site_config` - Configuration

### Fonctions utiles
```php
// Authentification
is_logged_in()
is_admin()

// Statistiques
get_user_stats($user_id)
get_admin_stats()

// Configuration
get_config($key, $default)
set_config($key, $value)

// Upload et email
upload_file($file, $target_dir)
send_email($to, $subject, $message)
```

## 🚦 Statuts des commandes

- `pending` - En attente
- `payment_verified` - Paiement vérifié
- `in_progress` - En cours
- `completed` - Terminé
- `cancelled` - Annulé
- `payment_rejected` - Paiement rejeté

## 🛡️ Sécurité

- Validation et nettoyage de toutes les entrées utilisateur
- Requêtes préparées (PDO) pour éviter les injections SQL
- Hachage sécurisé des mots de passe (password_hash)
- Protection CSRF (à implémenter)
- Contrôle d'accès basé sur les rôles

## 📱 Responsive Design

Le site est entièrement responsive et optimisé pour :
- Desktop (1200px+)
- Tablet (768px - 1199px)
- Mobile (< 768px)

## 🐛 Débogage

Activer le mode debug dans `config/config.php` :
```php
define('DEBUG_MODE', true);
```

## 📋 TODO / Roadmap

- [x] Structure de base et configuration
- [x] Système d'authentification
- [x] Page d'accueil et services
- [ ] Système de commande complet
- [ ] Tableau de bord utilisateur
- [ ] Panel d'administration
- [ ] Notifications email
- [ ] Génération de factures PDF
- [ ] Système de support

## 🤝 Contribution

1. Fork le projet
2. Créer une branche feature (`git checkout -b feature/AmazingFeature`)
3. Commit les changements (`git commit -m 'Add AmazingFeature'`)
4. Push vers la branche (`git push origin feature/AmazingFeature`)
5. Ouvrir une Pull Request

## 📄 Licence

Ce projet est sous licence MIT. Voir le fichier `LICENSE` pour plus de détails.

## 📞 Support

- **Email:** contact@tarantulasmm.bj
- **Téléphone:** +229 XX XX XX XX
- **Adresse:** Cotonou, Bénin

---

**TarantulaSMM Bénin** - Votre partenaire pour le boost de réseaux sociaux 🕷️🚀