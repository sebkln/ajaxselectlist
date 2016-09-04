.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _configuration-constants:

TypoScript Constants Reference
==============================

:typoscript:`plugin.tx_ajaxselectlist`

.. container:: ts-properties

	=========================== ========================================= ========
	Property                    Data type                                 Default
	=========================== ========================================= ========
	view.templateRootPath_      :ref:`t3tsref:data-type-path`             *empty*
	view.partialRootPath_       :ref:`t3tsref:data-type-path`             *empty*
	view.layoutRootPath_        :ref:`t3tsref:data-type-path`             *empty*
	persistence.storagePid_     :ref:`t3tsref:data-type-page-id`          *empty*
	persistence.recursive_      :ref:`t3tsref:data-type-positive-integer` *empty*
	settings.typeNum_           :ref:`t3tsref:data-type-positive-integer` 427590
	=========================== ========================================= ========

Property details
^^^^^^^^^^^^^^^^

.. _templateRootPath:

view.templateRootPath
"""""""""""""""""""""
.. container:: table-row

   Property
         view.templateRootPath
   Data type
         path
   Description
         Path to the templates for this extension. See :ref:`Changing Templates <configuration-templates>` how to use this.
   Default
         *empty*

.. _partialRootPath:

view.partialRootPath
""""""""""""""""""""
.. container:: table-row

   Property
         view.partialRootPath
   Data type
         path
   Description
         Path to the partials for this extension. See :ref:`Changing Templates <configuration-templates>` how to use this.

         .. note:: By default no partials are used by this extension. You're free to add some.
   Default
         *empty*

.. _layoutRootPath:

view.layoutRootPath
"""""""""""""""""""
.. container:: table-row

   Property
         view.layoutRootPath
   Data type
         path
   Description
         Path to the layout for this extension. See :ref:`Changing Templates <configuration-templates>` how to use this.
   Default
         *empty*

.. _settings.typeNum:

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
         *empty*

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
         *empty*

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

           Currently this setting is only used in the Fluid `f:form` Viewhelper. If you have to change it, you'll have to set the new typeNum in the ``PAGE`` object separately. This may be fixed in future versions.
   Default
         :typoscript:`427590`
