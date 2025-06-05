document.addEventListener('DOMContentLoaded', function () {

    function updateNotificationCount() {
        $.ajax({
            url: "api/notifications_amount",
            type: "GET",
            dataType: "json",
            success: function (response) {
                if (response.unread_count > 0) {
                    $('#notificationIcon').html(
                        '<i class="fa-solid fa-bell"></i>' +
                        `<span class="fa-layers-counter" style="background:Tomato; font-size: 2em">${response.unread_count}</span>`
                    );
                } else {
                    $('#notificationIcon').html('<i class="fa-solid fa-bell"></i>');
                }

            },
            error: function (xhr, status, error) {
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
            success: function (response) {
                $('#notificationList').html('');

                // Inizio la visualizzazione delle notifiche se ce ne sono
                if (response.data && response.data.length > 0) {
                    response.data.forEach(function (notification) {
                        $('#notificationList').append(

                            `<div class="notification-item ${notification.letto === 1 ? "" : "notification-item-new"} " id="notif-page-${notification.id}">` +
                            `<p>${notification.contenuto}</p>` +
                            `<small class="notification-date">${notification.created_at}</small>` +
                            `</div>`
                        );
                    });

                    // Controllo se ci siano più di una pagina
                    if (response.last_page > 1) {
                        let paginationHtml = '';
                        response.links.forEach(function (link) {
                            paginationHtml +=
                                `<button class="pagination-link ${link.active ? 'pagination-current' : ''}" data-url="${link.url}" ${link.url ? '' : 'disabled'}>${link.label}</button>`;
                        });
                        $('#notificationPagination').html(paginationHtml);

                        // Resetto il click handler per i link di paginazione
                        // In questo modo cambio la pagina che verrà caricata
                        $('#notificationPagination').off('click', '.pagination-link').on(
                            'click', '.pagination-link',
                            function () {
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
            error: function (xhr, status, error) {
                console.error('AJAX Error:', error);
                $('#notificationList').html('<p>Errore nel caricamento delle notifiche.</p>');
                $('#notificationPagination').html('');
            }
        });
    }

    $('#notificationIcon').on('click', function () {
        // Check if the container is already visible
        if ($('#userNotificationContainer').is(':visible')) {
            $('#userNotificationContainer').fadeOut();
            return;
        } else {
            loadNotificationsPage("api/notifications");
            $('#userNotificationContainer').fadeIn();
        }
    });

    // https://stackoverflow.com/questions/1403615/use-jquery-to-hide-a-div-when-the-user-clicks-outside-of-it
    $(document).mouseup(function (e) {
        var container = $("#userNotificationContainer");

        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.fadeOut();
        }
    });

    updateNotificationCount();

});