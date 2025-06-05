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



<script src="{{ asset('assets/js/timedNotification.js') }}"></script>
@endif
