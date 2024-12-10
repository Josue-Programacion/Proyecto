<?php
session_start();
require_once '../config/db_config.php';
require_once '../includes/functions.php';
require_once '../src/UserDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $pass = $_POST['password'];

    $userDAO = new UserDAO($pdo);
    if($user = $userDAO->login($email, $pass)) {
        // Login correcto
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['name'] = $user['name'];
        redirect('../public/index.php');
    } else {
        // Credenciales no válidas
        $_SESSION['error'] = "Credenciales no válidas";
        redirect('../public/login.php');
    }
} else {
    $_SESSION['error'] = "Acceso no permitido.";
    redirect('../public/login.php');
}
