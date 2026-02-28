// Attache les fonctions à l'objet window pour les rendre globales
window.openModal = function() {
    const modal = document.getElementById('postModal');
    if (modal) {
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    } else {
        console.error('Modal element not found!');
    }
}

window.closeModal = function() {
    const modal = document.getElementById('postModal');
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
}

// Fermer le modal si on clique en dehors
window.onclick = function(event) {
    const modal = document.getElementById('postModal');
    if (event.target === modal) {
        window.closeModal();
    }
}

// Vérification que le script est chargé
console.log('Modal.js loaded');