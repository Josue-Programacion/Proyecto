<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once '../config/db_config.php';
require_once '../includes/functions.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celular Market</title>
    <link rel="stylesheet" href="../css/ProyectoCss.css">
    <script defer src="../js/ProyectoJs.js"></script>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="../Imagenes/celularmarket_logo.png" alt="Logo Celular Market">
                <span>CELULAR MARKET</span>
            </div>
            <ul class="nav-links">
                <li><a href="productos.php">PRODUCTOS</a></li>
                <li><a href="contacto.php">CONTÁCTANOS</a></li>
                <li class="cart"><a href="carrito.php">$0,00 🛒</a></li>
                <?php if(isLoggedIn()): ?>
                    <li class="user"><a href="../php/logout.php">Salir (<?php echo $_SESSION['name']; ?>)</a></li>
                <?php else: ?>
                    <li class="user"><a href="login.php">👤</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <!-- Resto del contenido igual que tu index.html -->
    <!-- ... (hero, carousel, highlighted-products, services-info, footer) -->
    <section class="hero">
        <div class="hero-content">
            <h1>Los mejores descuentos en tecnología</h1>
            <p>Hasta 25% de descuento en productos seleccionados.</p>
            <div class="hero-buttons">
                <a href="productos.php" class="btn btn-primary">COMPRAR AHORA</a>
                <a href="productos.php" class="btn btn-secondary">EXPLORAR</a>
            </div>
        </div>
    </section>

    <section class="carousel">
        <div class="carousel-images" id="carouselImages">
            <a href="productos.php">
                <img src="../Imagenes/apple_logo.svg" alt="Apple">
                <span>Apple</span>
            </a>
            <a href="productos.php">
                <img src="../Imagenes/infinix_logo.png" alt="Infinix">
                <span>Infinix</span>
            </a>
            <a href="productos.php">
                <img src="../Imagenes/honor_logo.png" alt="Honor">
                <span>Honor</span>
            </a>
            <a href="productos.php">
                <img src="../Imagenes/tecno_logo.jpg" alt="Tecno">
                <span>Tecno</span>
            </a>
        </div>
    </section>

    <section class="highlighted-products">
        <div class="highlighted-product">
            <img src="../Imagenes/estiloAudifonos.webp" alt="Audífonos">
            <div class="info">
                <h3>20% EN AUDÍFONOS</h3>
                <p>Aprovecha nuestros descuentos en una amplia variedad de auriculares.</p>
                <a href="productos.php" class="btn btn-primary">VER MÁS</a>
            </div>
        </div>
        <div class="highlighted-product">
            <img src="../Imagenes/iphoneAzul.jpeg" alt="iPhone">
            <div class="info">
                <h3>Últimos Modelos de iPhone</h3>
                <p>Innovación, diseño y tecnología al alcance de tu mano.</p>
                <a href="productos.php" class="btn btn-primary">EXPLORAR</a>
            </div>
        </div>
        <div class="highlighted-product">
            <img src="../Imagenes/iphoneCeleste.webp" alt="Estilo de Vida">
            <div class="info">
                <h3>Tecnología al Estilo de Vida</h3>
                <p>Transforma tu día a día con los dispositivos más innovadores.</p>
                <a href="productos.php" class="btn btn-primary">DESCUBRE MÁS</a>
            </div>
        </div>
    </section>

    <section class="services-info">
        <div class="service">
            <img src="../Iconos/envio.webp" alt="Envío Nacional">
            <h3>Envío Nacional</h3>
            <p>Recibe tus productos en cualquier parte del Ecuador.</p>
        </div>
        <div class="service">
            <img src="../Iconos/calidad.webp" alt="Calidad Garantizada">
            <h3>Calidad Garantizada</h3>
            <p>Productos de las marcas más confiables.</p>
        </div>
        <div class="service">
            <img src="../Iconos/ofertas.webp" alt="Ofertas Exclusivas">
            <h3>Ofertas Exclusivas</h3>
            <p>Descuentos únicos en tecnología.</p>
        </div>
        <div class="service">
            <img src="../Iconos/pago_seguro.webp" alt="Pagos Seguros">
            <h3>Pagos Seguros</h3>
            <p>Compra con confianza y seguridad.</p>
        </div>
    </section>

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
                    <li><a href="#">Honor</a></li>
                    <li><a href="#">Infinix</a></li>
                </ul>
            </div>
            <div class="footer-links">
                <h3>ACCESORIOS</h3>
                <ul>
                    <li><a href="#">Relojes</a></li>
                    <li><a href="#">Parlantes</a></li>
                    <li><a href="#">Audífonos</a></li>
                    <li><a href="#">Cables</a></li>
                    <li><a href="#">Cargadores</a></li>
                </ul>
            </div>
            <div class="subscribe">
                <h3>Suscríbete</h3>
                <input type="email" placeholder="Tu correo electrónico">
                <button>SUBSCRIBIRSE</button>
            </div>
        </div>
        <div class="social-media">
            <a href="#">Facebook</a>
            <a href="#">YouTube</a>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>
            <a href="#">Google</a>
        </div>
        <p>&copy; 2024 CELULAR MARKET. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
