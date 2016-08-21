.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _developer:

Developer Corner
================


.. _developer-ajax:

Ajax request
------------

The jQuery ``ajax()`` method is used for the request. The script is part of the *List.html* template.

The result is loaded inside the div element ``#ajaxCallResult`` with a *fade* effect. After the website has fully loaded, the *change* event is triggered to load the content of the first select option.

Again, you can modify this to fit your needs. If you don't want to rely on jQuery, you can achieve the same with vanilla JavaScript (*XMLHttpRequest()*).

.. code-block:: javascript
   :linenos:

    jQuery(document).ready(function ($) {
        var form = $('#ajaxselectlist-form');
        var selectForm = $('.ajaxFormOption');
        var resultContainer = $('#ajaxCallResult');
        var service = {
            ajaxCall: function (data) {
                $.ajax({
                    url: 'index.php',
                    cache: false,
                    data: data.serialize(),
                    success: function (result) {
                        resultContainer.html(result).fadeIn('fast');
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
