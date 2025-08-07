-- Base de données TarantulaSMM Bénin
CREATE DATABASE IF NOT EXISTS tarantulasmm_bj CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE tarantulasmm_bj;

-- Table des utilisateurs
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    is_active TINYINT(1) DEFAULT 1,
    is_admin TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table des catégories
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    icon VARCHAR(50) NOT NULL, -- Classe Font Awesome
    description TEXT,
    is_active TINYINT(1) DEFAULT 1,
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des services
CREATE TABLE services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    min_quantity INT DEFAULT 1,
    max_quantity INT DEFAULT 10000,
    is_active TINYINT(1) DEFAULT 1,
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

-- Table des commandes
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    service_id INT NOT NULL,
    link VARCHAR(500) NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    total_amount DECIMAL(10,2) NOT NULL,
    payment_method ENUM('moov', 'mtn') NOT NULL,
    payment_proof VARCHAR(255), -- Nom du fichier de preuve
    status ENUM('pending', 'payment_verified', 'in_progress', 'completed', 'cancelled', 'payment_rejected') DEFAULT 'pending',
    admin_note TEXT,
    invoice_number VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (service_id) REFERENCES services(id) ON DELETE CASCADE
);

-- Table des tickets de support
CREATE TABLE support_tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    status ENUM('open', 'in_progress', 'closed') DEFAULT 'open',
    priority ENUM('low', 'medium', 'high') DEFAULT 'medium',
    admin_response TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Table des configurations
CREATE TABLE site_config (
    id INT AUTO_INCREMENT PRIMARY KEY,
    config_key VARCHAR(100) NOT NULL UNIQUE,
    config_value TEXT,
    description VARCHAR(255),
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table des notifications email
CREATE TABLE email_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT,
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('sent', 'failed') DEFAULT 'sent',
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Insertion des données par défaut

-- Admin par défaut (mot de passe: admin123)
INSERT INTO users (email, password, first_name, last_name, is_admin) 
VALUES ('admin@tarantulasmm.bj', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Admin', 'TarantulaSMM', 1);

-- Catégories par défaut avec icônes Font Awesome
INSERT INTO categories (name, icon, description, sort_order) VALUES
('Instagram', 'fab fa-instagram', 'Services pour Instagram', 1),
('Facebook', 'fab fa-facebook', 'Services pour Facebook', 2),
('TikTok', 'fab fa-tiktok', 'Services pour TikTok', 3),
('YouTube', 'fab fa-youtube', 'Services pour YouTube', 4),
('Twitter', 'fab fa-twitter', 'Services pour Twitter', 5),
('LinkedIn', 'fab fa-linkedin', 'Services pour LinkedIn', 6),
('Spotify', 'fab fa-spotify', 'Services de streaming musical', 7),
('SoundCloud', 'fab fa-soundcloud', 'Services SoundCloud', 8),
('Discord', 'fab fa-discord', 'Services Discord', 9),
('Telegram', 'fab fa-telegram', 'Services Telegram', 10);

-- Services par défaut pour Instagram
INSERT INTO services (category_id, name, description, price, min_quantity, max_quantity, sort_order) VALUES
(1, 'Followers Instagram', 'Augmentation du nombre de followers', 5.00, 100, 10000, 1),
(1, 'Likes Instagram', 'Likes sur vos publications', 2.00, 50, 5000, 2),
(1, 'Vues Instagram (Reels)', 'Vues sur vos Reels', 3.00, 100, 50000, 3),
(1, 'Commentaires Instagram', 'Commentaires personnalisés', 10.00, 5, 100, 4);

-- Services pour Facebook
INSERT INTO services (category_id, name, description, price, min_quantity, max_quantity, sort_order) VALUES
(2, 'Likes Page Facebook', 'Likes sur votre page Facebook', 8.00, 100, 10000, 1),
(2, 'Followers Facebook', 'Followers sur votre profil', 6.00, 100, 5000, 2),
(2, 'Vues Vidéo Facebook', 'Vues sur vos vidéos', 4.00, 500, 100000, 3);

-- Services pour TikTok
INSERT INTO services (category_id, name, description, price, min_quantity, max_quantity, sort_order) VALUES
(3, 'Followers TikTok', 'Augmentation des followers TikTok', 7.00, 100, 10000, 1),
(3, 'Likes TikTok', 'Likes sur vos vidéos TikTok', 3.00, 100, 10000, 2),
(3, 'Vues TikTok', 'Vues sur vos vidéos', 2.00, 1000, 100000, 3);

-- Configuration par défaut
INSERT INTO site_config (config_key, config_value, description) VALUES
('moov_number', '+229 XX XX XX XX', 'Numéro Moov Money'),
('mtn_number', '+229 XX XX XX XX', 'Numéro MTN Mobile Money'),
('smtp_host', 'smtp.gmail.com', 'Serveur SMTP'),
('smtp_port', '587', 'Port SMTP'),
('smtp_username', '', 'Nom d''utilisateur SMTP'),
('smtp_password', '', 'Mot de passe SMTP'),
('site_maintenance', '0', 'Mode maintenance (0=non, 1=oui)'),
('welcome_message', 'Bienvenue sur TarantulaSMM Bénin !', 'Message de bienvenue');