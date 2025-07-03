<?php
require_once __DIR__ . '/../core/Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function findUser($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    public function createUser($username, $password) {
        // Cek apakah username sudah ada
        $stmt = $this->db->prepare("SELECT id FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);

        if ($stmt->fetch()) {
            return false; // Username sudah dipakai
        }

        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        return $stmt->execute([
            'username' => $username,
            'password' => $hashed
        ]);
    }
}
