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
});