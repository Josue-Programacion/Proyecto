<?php
class UserDAO {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function register($name, $email, $password) {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare("INSERT INTO users (name,email,password) VALUES (?,?,?)");
        return $stmt->execute([$name,$email,$hash]);
    }

    public function login($email, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
