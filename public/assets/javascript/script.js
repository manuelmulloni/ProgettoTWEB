// Seleziona l'icona hamburger e il menu
const hamburger = document.querySelector('.hamburger-icon');
const mobileMenu = document.querySelector('.mobile-menu');

// Aggiungi un listener per l'evento click sull'icona hamburger
hamburger.addEventListener('click', () => {
    // Toglie/aggiunge la classe 'is-open' al menu per mostrarlo/nasconderlo
    mobileMenu.classList.toggle('is-open');

    // Aggiorna l'attributo aria-expanded per l'accessibilità
    const isExpanded = hamburger.getAttribute('aria-expanded') === 'true';
    hamburger.setAttribute('aria-expanded', !isExpanded);
});
