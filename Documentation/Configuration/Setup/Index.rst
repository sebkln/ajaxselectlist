.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _configuration-typoscript:

TypoScript Setup Reference
==========================

:typoscript:`plugin.tx_ajaxselectlist`

Properties
^^^^^^^^^^

.. container:: ts-properties

	================================ ================================================= =============================================================
	Property                         Data type                                         Default
	================================ ================================================= =============================================================
	view.templateRootPaths_          array of file paths with :ref:`stdWrap <stdwrap>` *array with fallback path and constant value*
	view.partialRootPaths_           array of file paths with :ref:`stdWrap <stdwrap>` *array with fallback path and constant value*
	view.layoutRootPaths_            array of file paths with :ref:`stdWrap <stdwrap>` *array with fallback path and constant value*
	persistence.storagePid_          :ref:`t3tsref:data-type-page-id`                  :typoscript:`{$plugin.tx_ajaxselectlist.settings.storagePid}`
	persistence.recursive_           :ref:`t3tsref:data-type-positive-integer`         :typoscript:`{$plugin.tx_ajaxselectlist.settings.recursive}`
	settings.typeNum_                :ref:`t3tsref:data-type-positive-integer`         :typoscript:`{$plugin.tx_ajaxselectlist.settings.typeNum}`
	settings.media.image.maxWidth_   pixels                                            :typoscript:`{$styles.content.textmedia.maxW}`
	settings.media.image.maxHeight_  pixels                                            *empty*
	settings.media.image.lightbox_   array of TypoScript properties                    *multiple Typoscript Constants from fluid_styled_content*
	================================ ================================================= =============================================================

Property details
^^^^^^^^^^^^^^^^

.. _templateRootPaths:

view.templateRootPaths
""""""""""""""""""""""
.. container:: table-row

   Property
         view.templateRootPaths
   Data type
         array of file paths with :ref:`stdWrap <stdwrap>`
   Description
         Array of paths to the templates for this extension. See :ref:`Changing Templates <configuration-templates>` how to use this.
   Default
         .. code-block:: typoscript

              view.templateRootPaths {
                 0 = EXT:ajaxselectlist/Resources/Private/Templates/
                 1 = {$plugin.tx_ajaxselectlist.view.templateRootPath}
              }

.. _partialRootPaths:

view.partialRootPaths
"""""""""""""""""""""
.. container:: table-row

   Property
         view.partialRootPaths
   Data type
         array of file paths with :ref:`stdWrap <stdwrap>`
   Description
         Array of paths to the partials for this extension. See :ref:`Changing Templates <configuration-templates>` how to use this.

         .. note:: By default no partials are used by this extension. You're free to add some.
   Default
         .. code-block:: typoscript

              view.partialRootPaths {
                 0 = EXT:ajaxselectlist/Resources/Private/Partials/
                 1 = {$plugin.tx_ajaxselectlist.view.partialRootPath}
              }

.. _layoutRootPaths:

view.layoutRootPaths
""""""""""""""""""""
.. container:: table-row

   Property
         view.layoutRootPaths
   Data type
         array of file paths with :ref:`stdWrap <stdwrap>`
   Description
         Array of paths to the layout for this extension. See :ref:`Changing Templates <configuration-templates>` how to use this.
   Default
         .. code-block:: typoscript

              view.layoutRootPaths {
                 0 = EXT:ajaxselectlist/Resources/Private/Layouts/
                 1 = {$plugin.tx_ajaxselectlist.view.layoutRootPath}
              }

.. _tsstoragePid:

persistence.storagePid
""""""""""""""""""""""
.. container:: table-row

   Property
         persistence.storagePid
   Data type
         page_id
   Description
         Comma-separated list of pages (UIDs) which contain records for this extension.
   Default
         :typoscript:`{$plugin.tx_ajaxselectlist.view.storagePid}`

.. _tsrecursive:

persistence.recursive
"""""""""""""""""""""
.. container:: table-row

   Property
         persistence.recursive
   Data type
         positive integer
   Description
         The **number of subpage levels** which are searched for records. Starting point are the page(s) that were set with :typoscript:`storagePid` or in the plugin form field *Record Storage Page*.

         ``0`` or empty = disable recursive mode
   Default
         :typoscript:`{$plugin.tx_ajaxselectlist.view.recursive}`

.. _tstypeNum:

settings.typeNum
""""""""""""""""
.. container:: table-row

   Property
         settings.typeNum
   Data type
         positive integer
   Description
         This determines the ``PAGE`` object that will be used to render the result of the Ajax call.

         .. attention::

           Currently this setting is only used in the Fluid ``f:form`` Viewhelper. If you have to change it, you'll have to set the new typeNum in the ``PAGE`` object separately. This may be fixed in future versions.
   Default
         :typoscript:`{$plugin.tx_ajaxselectlist.settings.typeNum}`


.. _tsmaxWidth:

settings.media.image.maxWidth
"""""""""""""""""""""""""""""
.. container:: table-row

   Property
         settings.media.image.maxWidth
   Data type
         pixels
   Description
         Sets the maximum width of images. By default it uses the :typoscript:`maxW` value of *fluid_styled_content*. Can of course be set to the *css_styled_content* equivalent.
   Default
         :typoscript:`{$styles.content.textmedia.maxW}`


.. _tsmaxHeight:

settings.media.image.maxHeight
""""""""""""""""""""""""""""""
.. container:: table-row

   Property
         settings.media.image.maxHeight
   Data type
         pixels
   Description
         Sets the maximum height of images.
   Default
         *empty*


.. _tslightbox:

settings.media.image.lightbox
"""""""""""""""""""""""""""""
.. container:: table-row

   Property
         settings.media.image.lightbox
   Data type
         array of TypoScript properties
   Description
         Array of lightbox settings for images. By default the TypoScript Constants of *fluid_styled_content* are used.

         | :typoscript:`class`: class-attribute for lightbox links
         | :typoscript:`rel`: rel-attribute for lightbox links
         | :typoscript:`width`: width of the enlarged media element
         | :typoscript:`height`: height of the enlarged media element

   Default
         .. code-block:: typoscript

            settings.media.image.lightbox {
               class = {$styles.content.textmedia.linkWrap.lightboxCssClass}
               rel = {$styles.content.textmedia.linkWrap.lightboxRelAttribute}
               width = {$styles.content.textmedia.linkWrap.width}
               height = {$styles.content.textmedia.linkWrap.height}
            }


PAGE object
^^^^^^^^^^^

This is used to render the return of the Ajax call. As TYPO3 would generate header code for every ``PAGE`` object and we only need the record's content, we strip it from all unnecessary code and deactivate the caching.

.. attention::
   For now, the typeNum isn't loaded with the same TypoScript constant which fills the setting above, because it would result in an error. This may be fixed in future versions.

   Anyway, it is very unlikely that you need to change the typeNum to prevent a conflict with another ``PAGE`` object.

.. code-block:: typoscript

	ajaxselectlist_page = PAGE
	ajaxselectlist_page {
	    typeNum = 427590

	    config {
	        disableAllHeaderCode = 1
	        additionalHeaders = Content-type:application/html
	        xhtml_cleaning = 0
	        debug = 0
	        no_cache = 1
	        admPanel = 0
	    }

	    10 < tt_content.list.20.ajaxselectlist_selectlist
	}