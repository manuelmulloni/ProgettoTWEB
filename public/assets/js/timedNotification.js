document.addEventListener('DOMContentLoaded', function () {
    // Show the notification
    $('#resultNotification').fadeIn('slow');

    // Hide the notification after 5 seconds
    timoutId = setTimeout(function () {
        $('#resultNotification').fadeOut('slow');
    }, 5000);

    // Add click event to the icon to hide the notification
    $('#notificationClose').on('click', function () {
        clearTimeout(timoutId); // Clear the timeout to prevent it from hiding again
        $('#resultNotification').fadeOut('slow');
    });

});