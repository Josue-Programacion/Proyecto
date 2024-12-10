<?php
session_start();
require_once '../config/db_config.php';
require_once '../includes/functions.php';
require_once '../src/ProductDAO.php';
require_once '../src/SaleDAO.php';

if(!isLoggedIn()) {
    echo "<p>Debe iniciar sesión.</p>";
    exit;
}

if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<p>El carrito está vacío.</p>";
    exit;
}

$productDAO = new ProductDAO($pdo);
$saleDAO = new SaleDAO($pdo);

$total = 0;
foreach($_SESSION['cart'] as $pid => $qty) {
    $product = $productDAO->getProductById($pid);
    if($product) {
        $total += $product['price'] * $qty;
    }
}

$sale_id = $saleDAO->createSale($_SESSION['user_id'], $total);

foreach($_SESSION['cart'] as $pid => $qty) {
    $product = $productDAO->getProductById($pid);
    if($product) {
        $saleDAO->addSaleDetail($sale_id, $pid, $qty, $product['price']);
        $new_stock = $product['stock'] - $qty;
        $productDAO->updateStock($pid, $new_stock);
    }
}

$_SESSION['cart'] = [];

echo "<h1>Compra realizada</h1>";
echo "<p>Su número de venta es: $sale_id</p>";
echo "<p><a href='../public/index.php'>Volver al inicio</a></p>";
