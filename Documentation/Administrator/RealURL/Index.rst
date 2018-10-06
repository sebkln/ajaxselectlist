.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _administrator-realurl:

Using EXT:ajaxselectlist with speaking URLs
===========================================

So you have successfully configured *ajaxselectlist*, then activated RealURL and now just get an error message?

The message should read as follows:

| Page Not Found
| Reason: Segment "index.php" was not a keyword for a postVarSet as expected on page with id=28.

Luckily there's an easy solution: Just adapt the Ajax call in template *List.html*. Change ``url: 'index.php'`` to ``url: '/'``:

.. code-block:: javascript
	:emphasize-lines: 8

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
						//  type: 'image'
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

.. note:: Starting with ajaxselectlist v4.0.0, the *List.html* template is already adapted. This also allows to work with the speaking URLs of TYPO3 v9.
