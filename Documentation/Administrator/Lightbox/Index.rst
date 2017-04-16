.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _administrator-lightbox:

Using a lightbox within option records
======================================

Out of the box, your lightbox most likely won't work with media inside your option record.

That's because every time you select an option, the DOM (Document Object Model) will change. Your lightbox was initialized after document ready, though, and cannot know about these modifications.

Using the provided Ajax call in template *List.html*, you'll have to call your lightbox again inside the *success* function.

Below is an example using the lightbox `magnific popup <http://dimsemenov.com/plugins/magnific-popup/>`_:

.. code-block:: javascript
   :emphasize-lines: 13-15

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
						$('.lightbox').magnificPopup({
							type: 'image'
						});
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

.. tip::

   If you don't want to use image zoom at all, remove the *'Click-enlarge (image_zoom)'* permission for your editors (inside Backend usergroup / Access Lists / 'Allowed excludefields' / Option Record).

   Another approach is to hide the field with Page TSconfig: ``TCEFORM.tx_ajaxselectlist_domain_model_optionrecord.image_zoom.disabled = 1``

