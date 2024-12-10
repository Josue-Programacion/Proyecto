<?php
session_start();
require_once '../config/db_config.php';
require_once '../includes/functions.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Celular Market</title>
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
            </ul>
        </nav>
    </header>

    <main>
        <h1>Contáctanos</h1>
        <p>Esta es una página de contacto de ejemplo.</p>
    </main>

    <footer>
        <p>&copy; 2024 CELULAR MARKET. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
