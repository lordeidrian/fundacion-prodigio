import './bootstrap';
document.addEventListener('DOMContentLoaded', () => {
    const header = document.getElementById('main-header');

    // Salimos de la función si el header no existe en la página actual
    if (!header) {
        return;
    }

    const handleScroll = () => {
        // Comprobamos la posición del scroll
        const isScrolled = window.scrollY > 50;

        // Usamos toggle para añadir/quitar la clase de forma más eficiente
        header.classList.toggle('scrolled', isScrolled);
        header.classList.toggle('shadow-sm', isScrolled);
    };

    // Añadimos el listener para el evento de scroll
    window.addEventListener('scroll', handleScroll);

    // Llamamos a la función una vez al cargar por si la página ya tiene scroll
    handleScroll();
    // --- NUEVO CÓDIGO: Animación de Contadores ---
    const counters = document.querySelectorAll('.counter');
    if (counters.length === 0) return; // Sale si no hay contadores. El resto del script se mantiene igual.
    const speed = 200; // Velocidad de la animación

    const animateCounters = () => {
        counters.forEach(counter => {
            const updateCount = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText.replace('+', '');
                const increment = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(updateCount, 1);
                } else {
                    counter.innerText = target.toLocaleString() + (counter.innerHTML.includes('+') ? '+' : '');
                }
            };
            updateCount();
        });
    };

    // Observer para activar la animación solo cuando la sección es visible
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    const counterSection = document.querySelector('.counter');
    if(counterSection) {
        observer.observe(counterSection.parentElement.parentElement.parentElement);
    }
});