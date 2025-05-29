<style>
    .notification {
        position: fixed;
        bottom: 0;
        right: 0;
        z-index: 1000;
        padding: 20px;
        border-radius: 5px;
    }

    .notification-error {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .notification-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .notification-close {
        cursor: pointer;
    }
</style>

@if (isset($error) || isset($success))

   <div class="notification {{ isset($error) ? 'notification-error' : 'notification-success' }}" hidden id="resultNotification">

        <div style="display: flex; justify-content: space-between;">
            <h4>Notifica</h4>
            <div id="notificationClose" class="notification-close">
            <i class="fa-solid fa-circle-xmark"></i>
            </div>
        </div>

        <p> {{ isset($error) ? $error : $success }}</p>
    </div>




    <script>
        $(document).ready(function() {
            // Show the notification
            $('#resultNotification').fadeIn('slow');

            // Hide the notification after 5 seconds
            timoutId = setTimeout(function() {
                $('#resultNotification').fadeOut('slow');
            }, 5000);

            // Add click event to the icon to hide the notification
            $('#notificationClose').on('click', function() {
                clearTimeout(timoutId); // Clear the timeout to prevent it from hiding again
                $('#resultNotification').fadeOut('slow');
            });

        });
    </script>
@endif
