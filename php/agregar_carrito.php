<?php
session_start();
require_once '../config/db_config.php';
require_once '../includes/functions.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];

    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Agrega el producto al carrito o incrementa la cantidad si ya existe
    $_SESSION['cart'][$product_id] = ($_SESSION['cart'][$product_id] ?? 0) + $quantity;

    redirect('../public/carrito.php');
} else {
    echo "<p>Acceso no permitido.</p>";
}
