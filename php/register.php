<?php
session_start();
require_once '../config/db_config.php';
require_once '../includes/functions.php';
require_once '../src/UserDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if(!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password)) {
        $userDAO = new UserDAO($pdo);
        if($userDAO->register($name, $email, $password)) {
            redirect('../public/login.php');
        } else {
            echo "<p>Error al registrar. Posiblemente el email ya existe.</p>";
        }
    } else {
        echo "<p>Datos inválidos.</p>";
    }
} else {
    echo "<p>Acceso no permitido.</p>";
}
