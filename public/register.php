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
    <title>Registrarse - Celular Market</title>
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
                <li><a href="contacto.php">CONTÁCTANOS</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="form-section">
            <h2>Crear una Cuenta</h2>
            <form action="../php/register.php" method="POST">
                <label for="nombre">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Tu nombre completo" required>

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" placeholder="Tu correo electrónico" required>

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Crea una contraseña" required>
                
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
            <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <div class="logo-footer">
                <img src="../Imagenes/celularmarket_logo.png" alt="Logo Celular Market">
                <p>LO MEJOR EN TECNOLOGÍA</p>
            </div>
            <div class="footer-links">
                <h3>ACCESORIOS</h3>
                <ul>
                    <li><a href="#">Audífonos</a></li>
                    <li><a href="#">Parlantes</a></li>
                </ul>
            </div>
        </div>
        <p>&copy; 2024 CELULAR MARKET. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
