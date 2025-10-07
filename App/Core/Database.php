<?php
namespace App\Core;
use PDO;
use PDOException;
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__.'/../../Config');
$dotenv->load();

/**
 * Classe pour gérer la connexion à la base de données
 * Utilise le design pattern Singleton pour garantir une seule instance de connexion
 */
class Database {
    
    private static $instance = null; // Instance unique
    private $connection; // Connexion PDO

    // Constructeur privé pour empêcher l'instanciation directe
    private function __construct() {
        try {
            // Charge le fichier de configuration avec les informations de connexion
            $dsn = "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset=utf8";
            $this->connection = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASS']);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    // Méthode pour obtenir l'instance unique
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Méthode pour obtenir la connexion PDO
    public function getConnection() {
        return $this->connection;
    }

    // Empêche le clonage de l'instance
    private function __clone() {}

    // Empêche la désérialisation de l'instance
    public function __wakeup() {}
}

?>
