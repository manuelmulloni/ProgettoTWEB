document.addEventListener('DOMContentLoaded', function () {
    // Necessario per il menu a tendina
    $('.hamburger-icon').click(function () {
        $('.mobile-menu').toggleClass('is-open');
        const isExpanded = $(this).attr('aria-expanded') === 'true';
        $(this).attr('aria-expanded', !isExpanded);
    });


    // Frecce per la navigazione
    $('#historyBack').click(function () {
        const currentUrl = window.location.href;
        window.history.back();
        if (window.location.href === currentUrl) {
            // Non c'è una pagina precedente nella cronologia
            // Disattiva il pulsante
            $(this).attr('disabled', true).toggleClass('disabled-pointer', true);
        }
    });


    $('#historyForward').click(function () {
        const currentUrl = window.location.href;
        window.history.forward();
        if (window.location.href === currentUrl) {
            // Non c'è una pagina successiva nella cronologia
            // Disattiva il pulsante
            $(this).attr('disabled', true).toggleClass('disabled-pointer', true);
        }
    });




});

function toggleForm(id) {
    $('#form-' + id).toggle();
}

