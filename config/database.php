<?php
// Configuration de la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'tarantulasmm_bj');
define('DB_USER', 'root'); // Modifier selon l'environnement
define('DB_PASS', '');     // Modifier selon l'environnement
define('DB_CHARSET', 'utf8mb4');

class Database {
    private static $instance = null;
    private $connection;
    
    private function __construct() {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            $this->connection = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        } catch (PDOException $e) {
            if (DEBUG_MODE) {
                die("Erreur de connexion à la base de données : " . $e->getMessage());
            } else {
                die("Erreur de connexion à la base de données.");
            }
        }
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->connection;
    }
    
    // Méthode pour exécuter des requêtes préparées
    public function query($sql, $params = []) {
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            if (DEBUG_MODE) {
                throw new Exception("Erreur SQL : " . $e->getMessage());
            } else {
                throw new Exception("Erreur lors de l'exécution de la requête.");
            }
        }
    }
    
    // Méthode pour obtenir le dernier ID inséré
    public function lastInsertId() {
        return $this->connection->lastInsertId();
    }
}

// Instance globale de la base de données
$db = Database::getInstance();
?>