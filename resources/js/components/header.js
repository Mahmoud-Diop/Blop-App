export function initHeaderMenu() {
    const hamburger = document.querySelector('.hamburger');
    const menu = document.querySelector('.menu');

    // Vérifier que les éléments existent
    if (!hamburger || !menu) return;

    hamburger.addEventListener('click', (e) => {
        e.stopPropagation();
        hamburger.classList.toggle('active');
        menu.classList.toggle('active');
    });

    //  menu Fermer au clic sur un lien
    const links = document.querySelectorAll('.menu-link');
    links.forEach(link => {
        link.addEventListener('click', () => {
            hamburger.classList.remove('active');
            menu.classList.remove('active');
        });
    });

    //  menu fermer  au clic en dehors
    document.addEventListener('click', (e) => {
        if (!hamburger.contains(e.target) && !menu.contains(e.target)) {
            hamburger.classList.remove('active');
            menu.classList.remove('active');
        }
    });

    // redimensionnement de la fenêtre
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768) {
            hamburger.classList.remove('active');
            menu.classList.remove('active');
        }
    });
}