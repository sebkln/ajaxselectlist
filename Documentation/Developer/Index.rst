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

You can choose between an Ajax request with jQuery or vanilla JavaScript (*XMLHttpRequest*). **Default** is the jQuery solution.

These scripts are stored in two external files (*ajax.jquery.js* and *ajax.vanilla.js*).

The *List.html* template contains a ``FooterAssets`` section where one of the scripts is rendered, depending on the :ref:`TypoScript setting <tsuseAjaxwithJQuery>`.

The result of the Ajax request is loaded inside the div element ``#ajaxCallResult`` with a *fade* effect. After the website has fully loaded, the *change* event is triggered to load the content of the first select option.

.. tip::

   Again, you can modify any of these solutions to fit your needs. You can use the ``FooterAssets`` section in the *List.html* template to render your custom JavaScript instead.

Default: jQuery.ajax()
~~~~~~~~~~~~~~~~~~~~~~

Found in file: :file:`Resources/Public/JavaScript/ajax.jquery.js`

The `jQuery.ajax() <https://api.jquery.com/jquery.ajax/>`__ method is used for the request.

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

Alternative: XMLHttpRequest()
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Found in file: :file:`Resources/Public/JavaScript/ajax.vanilla.js`

An `XMLHttpRequest() <https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest>`__ is used for the request.

.. code-block:: javascript
   :linenos:

   document.addEventListener('DOMContentLoaded', function () {
       let form = document.getElementById('ajaxselectlist-form'),
           selectForm = document.getElementById('ajaxselectlist-select'),
           resultContainer = document.getElementById('ajaxCallResult');

       let ajaxCall = new XMLHttpRequest();
       ajaxCall.onreadystatechange = function () {
           if (ajaxCall.readyState === 4) {
               if (ajaxCall.status === 200) {
                   resultContainer.innerHTML = ajaxCall.responseText;
               } else {
                   resultContainer.innerHTML = ajaxCall.statusText;
               }
           }
       };

       let getData = function () {
           let queryString = new URLSearchParams(new FormData(form)).toString();
           queryString = '?' + queryString;
           return queryString;
       };

       selectForm.addEventListener("change", function () {
           data = getData();
           ajaxCall.open('GET', data);
           ajaxCall.send();
       });

       let event = new Event('change');
       selectForm.dispatchEvent(event);
   });

.. important::

   This script currently only works in modern browsers (no Internet Explorer).