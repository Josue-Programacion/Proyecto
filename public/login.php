<?php
session_start();
require_once '../config/db_config.php';
require_once '../includes/functions.php';

// Si hay un error almacenado en la sesión, lo mostramos y luego lo borramos
$error = '';
if(isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Celular Market</title>
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
            <h2>Iniciar Sesión</h2>
            <?php if($error): ?>
                <p style="color:red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <form action="../php/login.php" method="POST">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" placeholder="Escribe tu correo" required>
                
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Escribe tu contraseña" required>
                
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </form>
            <p>¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a></p>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <div class="logo-footer">
                <img src="../Imagenes/celularmarket_logo.png" alt="Logo Celular Market">
                <p>LO MEJOR EN TECNOLOGÍA</p>
            </div>
            <div class="footer-links">
                <h3>CELULARES</h3>
                <ul>
                    <li><a href="#">Samsung</a></li>
                    <li><a href="#">Apple</a></li>
                    <li><a href="#">Xiaomi</a></li>
                </ul>
            </div>
        </div>
        <p>&copy; 2024 CELULAR MARKET. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
