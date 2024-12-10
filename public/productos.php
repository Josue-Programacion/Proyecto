<?php
session_start();
require_once '../config/db_config.php';
require_once '../includes/functions.php';
require_once '../src/ProductDAO.php';

$productDAO = new ProductDAO($pdo);
$products = $productDAO->getAllProducts();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - Celular Market</title>
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
                <li><a href="contacto.php">CONTACTO</a></li>
                <li><a href="carrito.php">CARRITO</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="product-list">
            <h2>Productos Disponibles</h2>
            <?php foreach($products as $prod): ?>
            <div class="product-item">
                <img src="../<?php echo htmlspecialchars($prod['image']); ?>" alt="<?php echo htmlspecialchars($prod['name']); ?>">
                <h3><?php echo htmlspecialchars($prod['name']); ?></h3>
                <p>$<?php echo number_format($prod['price'],2); ?></p>
                <?php if(isLoggedIn()): ?>
                    <form action="../php/agregar_carrito.php" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $prod['id']; ?>">
                        <input type="number" name="quantity" value="1" min="1" max="<?php echo $prod['stock']; ?>">
                        <button class="btn btn-primary" type="submit">Agregar al Carrito</button>
                    </form>
                <?php else: ?>
                    <p><a href="login.php">Inicia sesión para comprar</a></p>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 CELULAR MARKET. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
