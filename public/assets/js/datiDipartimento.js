document.addEventListener('DOMContentLoaded', function () {

    const data = JSON.parse($('meta[data-for-external-file]').attr('data-for-external-file')).id;

    $('.entry').on('click', function () {
        injectDescLong($(this), `/public/ajax/descrizione-dipartimento/${data}`);
    });


    function injectDescLong(dipartimento, route) {
        const id = dipartimento.attr('id');
        const lDesc = dipartimento.find('.lDesc');
        const lDescLable = dipartimento.find('.lDescLable');

        if (lDesc.is(':empty')) {
            $.ajax({
                type: 'GET',
                url: route,
                dataType: "json",
                success: function (data) {
                    lDesc.html(data.descrizione).show();
                    lDescLable.html('Descrizione estesa (<span style="color:red;">nascondi</span>)');
                }
            });
        } else if (lDesc.is(':hidden')) {
            lDesc.show();
            lDescLable.html('Descrizione estesa (<span style="color:red;">nascondi</span>)');
        } else {
            lDesc.hide();
            lDescLable.html('Descrizione estesa (<span style="color:red;">mostra</span>)');
        }
    }
});