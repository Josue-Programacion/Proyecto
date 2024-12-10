<?php
session_start();
require_once '../config/db_config.php';
require_once '../includes/functions.php';
require_once '../src/ProductDAO.php';

if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$productDAO = new ProductDAO($pdo);
$total = 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito - Celular Market</title>
    <link rel="stylesheet" href="../css/ProyectoCss.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="../Imagenes/celularmarket_logo.png" alt="Logo Celular Market">
                <span>CELULAR MARKET</span>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">INICIO</a></li>
                <li><a href="productos.php">PRODUCTOS</a></li>
                <li><a href="contacto.php">CONTACTO</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Carrito de Compras</h1>
        <form action="../php/checkout.php" method="post">
        <table>
            <tr>
                <th>Producto</th><th>Cantidad</th><th>Precio Unidad</th><th>Subtotal</th>
            </tr>
            <?php foreach($_SESSION['cart'] as $pid=>$qty):
                $product = $productDAO->getProductById($pid);
                if($product) {
                    $subtotal = $qty * $product['price'];
                    $total += $subtotal;
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                    <td><?php echo $qty; ?></td>
                    <td>$<?php echo number_format($product['price'],2); ?></td>
                    <td>$<?php echo number_format($subtotal,2); ?></td>
                </tr>
            <?php } endforeach; ?>
            <tr>
                <td colspan="3">Total</td>
                <td>$<?php echo number_format($total,2); ?></td>
            </tr>
        </table>
        <?php if(isLoggedIn() && $total > 0): ?>
            <button type="submit" name="checkout">Proceder al pago</button>
        <?php else: ?>
            <p>Inicia sesión para proceder al pago o agrega productos.</p>
        <?php endif; ?>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 CELULAR MARKET. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
