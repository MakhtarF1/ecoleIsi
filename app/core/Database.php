<?php
class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $config = require __DIR__ . '/../config/database.php';
        
        try {
            $this->connection = new mysqli(
                $config['host'],
                $config['username'],
                $config['password'],
                $config['dbname']
            );

            if ($this->connection->connect_error) {
                throw new Exception("Erreur de connexion: " . $this->connection->connect_error);
            }

            $this->connection->set_charset("utf8");
        } catch (Exception $e) {
            die("Erreur de connexion: " . $e->getMessage());
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
}