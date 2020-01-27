jQuery(document).ready(function ($) {
    var form = $('#ajaxselectlist-form');
    var selectForm = $('.ajaxFormOption');
    var resultContainer = $('#ajaxCallResult');
    var service = {
        ajaxCall: function (data) {
            $.ajax({
                url: '/',
                cache: false,
                data: data.serialize(),
                success: function (result) {
                    resultContainer.html(result).fadeIn('fast');
                    // IMPORTANT! When using a lightbox for images, you'll need to call it again after Ajax is done adding the new DOM to the document:
                    // $('.lightbox').magnificPopup({
                    // 	type: 'image'
                    // });
                },
                error: function (jqXHR, textStatus, errorThrow) {
                    resultContainer.html('Ajax request - ' + textStatus + ': ' + errorThrow).fadeIn('fast');
                }
            });
        }
    };
    form.submit(function (ev) {
        ev.preventDefault();
        service.ajaxCall($(this));
    });
    selectForm.on('change', function () {
        resultContainer.fadeOut('fast');
        form.submit();
    });
    selectForm.trigger('change');
});
