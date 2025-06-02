@if (Auth::user()->isCliente())
    <!-- From https://docs.fontawesome.com/web/style/layer -->
    <span class="fa-layers fa-fw notification-close" id="notificationIcon"> <i class="fa-solid fa-bell"></i> </span>

    <div class="client-nofication" id="userNotificationContainer" hidden>

        <div style="display: flex; justify-content: space-between;">
            <h4>Notifiche</h4>
        </div>

        <div id="notificationList"></div>

        <div id="notificationPagination" class="notification-pagination"></div>
    </div>

    <script>
        $(document).ready(function() {

            function updateNotificationCount() {
                $.ajax({
                    url: "{{ route('notifications.amount') }}",
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        if (response.unread_count > 0) {
                            $('#notificationIcon').html(
                                '<i class="fa-solid fa-bell"></i>' +
                                `<span class="fa-layers-counter" style="background:Tomato">${response.unread_count}</span>`
                            );
                        } else {
                            $('#notificationIcon').html('<i class="fa-solid fa-bell"></i>');
                        }

                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', error);
                    }
                });
            }

            function loadNotificationsPage(url) {
                $('#notificationList').html('<p>Caricamento notifiche...</p>');
                $('#notificationPagination').html('');

                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        $('#notificationList').html('');

                        // Inizio la visualizzazione delle notifiche se ce ne sono
                        if (response.data && response.data.length > 0) {
                            response.data.forEach(function(notification) {
                                $('#notificationList').append(

                                    `<div class="notification-item" id="notif-page-${notification.id}">` +
                                    `<p>${notification.contenuto}</p>` +
                                    `<small class="notification-date">${notification.created_at}</small>` +
                                    `</div>`
                                );
                            });

                            // Controllo se ci siano più di una pagina
                            if (response.last_page > 1) {
                                let paginationHtml = '';
                                response.links.forEach(function(link) {
                                    paginationHtml +=
                                        `<button class="pagination-link ${link.active ? 'pagination-current' : ''}" data-url="${link.url}" ${link.url ? '' : 'disabled'}>${link.label}</button>`;
                                });
                                $('#notificationPagination').html(paginationHtml);

                                // Resetto il click handler per i link di paginazione
                                // In questo modo cambio la pagina che verrà caricata
                                $('#notificationPagination').off('click', '.pagination-link').on(
                                    'click', '.pagination-link',
                                    function() {
                                        let pageUrl = $(this).data('url');
                                        if (pageUrl) {
                                            loadNotificationsPage(pageUrl);
                                        }
                                    });
                            } else {
                                $('#notificationPagination').html('');
                            }

                        } else {
                            $('#notificationList').html('<p>Nessuna notifica</p>');
                            $('#notificationPagination').html('');
                        }

                        // Aggiorno il conteggio delle notifiche
                        updateNotificationCount();

                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', error);
                        $('#notificationList').html('<p>Errore nel caricamento delle notifiche.</p>');
                        $('#notificationPagination').html('');
                    }
                });
            }

            $('#notificationIcon').on('click', function() {
                // Check if the container is already visible
                if ($('#userNotificationContainer').is(':visible')) {
                    $('#userNotificationContainer').fadeOut();
                    return;
                } else {
                    loadNotificationsPage("{{ route('notifications.get') }}");
                    $('#userNotificationContainer').fadeIn();
                }
            });

            updateNotificationCount();

        });
    </script>
@endif
