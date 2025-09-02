<?php
class UserModel {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function register($firstname, $lastname, $email, $password, $role = 'user') {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (firstname, lastname, email, password, role) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$firstname, $lastname, $email, $passwordHash, $role]);
    }

    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
