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

// Modal

var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("openRegisterModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
