@if (Auth::user()->isCliente())
    <!-- From https://docs.fontawesome.com/web/style/layer -->
    <span class="fa-layers fa-fw notification-close" id="notificationIcon"> <i class="fa-solid fa-bell"></i> </span>

    <div class="client-nofication" id="userNotificationContainer" hidden>

        <div class="flex-space-between">
            <h4>Notifiche</h4>
        </div>

        <div id="notificationList"></div>

        <div id="notificationPagination" class="notification-pagination"></div>
    </div>

    <script src="{{ asset('assets/js/userNotification.js') }}"></script>
@endif
