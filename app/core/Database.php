<?php
class Database {
    private $pdo;

    public function __construct() {
        $config = require __DIR__ . '/../../config.php';
        $db = $config['db'];

        try {
            $this->pdo = new PDO("pgsql:host={$db['host']};port={$db['port']};dbname={$db['dbname']}", $db['user'], $db['pass']);
        } catch (PDOException $e) {
            die("Database Connection Failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}
