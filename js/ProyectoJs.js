
document.addEventListener('DOMContentLoaded', () => {
    const carouselContainer = document.getElementById('carouselImages');
    const images = Array.from(carouselContainer.children); // Convertir NodeList en Array
    let currentIndex = 1;

    // Clonar el primer y último elemento para un efecto infinito
    const firstClone = images[0].cloneNode(true);
    const lastClone = images[images.length - 1].cloneNode(true);
    carouselContainer.appendChild(firstClone); // Agregar al final
    carouselContainer.insertBefore(lastClone, images[0]); // Agregar al inicio

    // Ajustar posición inicial
    const imageWidth = images[0].clientWidth;
    carouselContainer.style.transform = `translateX(-${currentIndex * imageWidth}px)`;

    // Función para iniciar el carrusel
    function startCarousel() {
        setInterval(() => {
            currentIndex++;
            carouselContainer.style.transition = "transform 0.5s ease-in-out";
            carouselContainer.style.transform = `translateX(-${currentIndex * imageWidth}px)`;

            // Reiniciar posición al llegar al final o principio
            carouselContainer.addEventListener('transitionend', () => {
                if (currentIndex === images.length + 1) {
                    carouselContainer.style.transition = "none";
                    currentIndex = 1;
                    carouselContainer.style.transform = `translateX(-${currentIndex * imageWidth}px)`;
                }
                if (currentIndex === 0) {
                    carouselContainer.style.transition = "none";
                    currentIndex = images.length;
                    carouselContainer.style.transform = `translateX(-${currentIndex * imageWidth}px)`;
                }
            });
        }, 3000); // Cambiar cada 3 segundos
    }

    // Iniciar el carrusel
    startCarousel();




    // Botones de las ofertas destacadas
    const offerButtons = document.querySelectorAll('.highlighted-product .btn');
    offerButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            window.location.href = 'productos.html';
        });
    });

    // Hover en imágenes del carrusel
    const carouselLinks = document.querySelectorAll('.carousel-images a img');
    carouselLinks.forEach(img => {
        img.addEventListener('mouseover', () => {
            img.style.opacity = '0.8';
        });
        img.addEventListener('mouseout', () => {
            img.style.opacity = '1';
        });
    });

    // Validación del campo de suscripción
    const subscribeBtn = document.querySelector('.subscribe button');
    const emailInput = document.querySelector('.subscribe input');

    subscribeBtn.addEventListener('click', (e) => {
        e.preventDefault();
        const email = emailInput.value;

        if (validateEmail(email)) {
            alert('Gracias por suscribirte a Celular Market!');
            emailInput.value = '';
        } else {
            alert('Por favor, ingresa un correo electrónico válido.');
        }
    });

    // Validación de correos electrónicos
    function validateEmail(email) {
        const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        return re.test(email);
    }

    // Scroll suave para enlaces internos
    const smoothScrollLinks = document.querySelectorAll('a[href^="#"]');
    smoothScrollLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = link.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
});