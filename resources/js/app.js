import './bootstrap';
document.addEventListener('DOMContentLoaded', () => {
    // --- Lógica del header (navbar scroll) ---
    const header = document.getElementById('main-header');
    if (header) {
        const handleScroll = () => {
            const isScrolled = window.scrollY > 50;
            header.classList.toggle('scrolled', isScrolled);
            header.classList.toggle('shadow-sm', isScrolled);
        };
        window.addEventListener('scroll', handleScroll);
        handleScroll();
    }

    // --- Lógica para el botón "Volver Arriba" ---
    const scrollToTopBtn = document.getElementById('scrollToTopBtn');
    const toggleScrollToTopButton = () => {
        if (window.scrollY > 200) {
            scrollToTopBtn && scrollToTopBtn.classList.add('show');
        } else {
            scrollToTopBtn && scrollToTopBtn.classList.remove('show');
        }
    };
    toggleScrollToTopButton();
    document.addEventListener('scroll', toggleScrollToTopButton);
    if (scrollToTopBtn) {
        scrollToTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // --- Lógica para el botón de WhatsApp y Mini Chat ---
    const whatsappBtn = document.getElementById('whatsapp-btn');
    const whatsappMinichat = document.querySelector('.whatsapp-minichat');
    const minichatCloseBtn = document.querySelector('.minichat-close-btn');
    const whatsappLink = document.getElementById('whatsapp-link');

    // Función para generar un número aleatorio de WhatsApp (placeholder)
    const generateRandomWhatsAppNumber = () => {
        const prefixes = ['595981', '595971', '595991'];
        const randomPrefix = prefixes[Math.floor(Math.random() * prefixes.length)];
        const randomNumber = Math.floor(100000 + Math.random() * 900000);
        return `${randomPrefix}${randomNumber}`;
    };

    if (whatsappBtn && whatsappMinichat) {
        whatsappBtn.addEventListener('click', (event) => {
            event.stopPropagation();
            whatsappMinichat.classList.toggle('show');
            if (whatsappMinichat.classList.contains('show') && whatsappLink) {
                const number = generateRandomWhatsAppNumber();
                whatsappLink.href = `https://wa.me/${number}`;
            }
        });
    }
    if (minichatCloseBtn && whatsappMinichat) {
        minichatCloseBtn.addEventListener('click', () => {
            whatsappMinichat.classList.remove('show');
        });
    }
    document.addEventListener('click', (event) => {
        if (
            whatsappMinichat &&
            whatsappBtn &&
            !whatsappMinichat.contains(event.target) &&
            !whatsappBtn.contains(event.target)
        ) {
            whatsappMinichat.classList.remove('show');
        }
    });

    // --- Animación de Contadores (sin cambios) ---
    const counters = document.querySelectorAll('.counter');
    if (counters.length > 0) {
        const speed = 200;
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
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        const counterSection = document.querySelector('.counter');
        if (counterSection) {
            observer.observe(counterSection.parentElement.parentElement.parentElement);
        }
    }
});