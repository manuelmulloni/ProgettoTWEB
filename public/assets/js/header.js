document.addEventListener('DOMContentLoaded', function () {
    $('.hamburger-icon').click(function() {
        $('.mobile-menu').toggleClass('is-open');
        const isExpanded = $(this).attr('aria-expanded') === 'true';
        $(this).attr('aria-expanded', !isExpanded);
    });
});

function toggleForm(id) {
    $('#form-' + id).toggle();
}
