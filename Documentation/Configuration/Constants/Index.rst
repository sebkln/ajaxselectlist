.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _configuration-constants:

TypoScript Constants Reference
==============================

:typoscript:`plugin.tx_ajaxselectlist_selectlist`

.. container:: ts-properties

	=========================== ========================================= ===============================================
	Property                    Data type                                 Default
	=========================== ========================================= ===============================================
	view.templateRootPath_      :ref:`t3tsref:data-type-path`             EXT:ajaxselectlist/Resources/Private/Templates/
	view.partialRootPath_       :ref:`t3tsref:data-type-path`             EXT:ajaxselectlist/Resources/Private/Partials/
	view.layoutRootPath_        :ref:`t3tsref:data-type-path`             EXT:ajaxselectlist/Resources/Private/Layouts/
	settings.typeNum_           :ref:`t3tsref:data-type-positive-integer` 427590
	=========================== ========================================= ===============================================

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
         :typoscript:`EXT:ajaxselectlist/Resources/Private/Templates/`

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
         :typoscript:`EXT:ajaxselectlist/Resources/Private/Partials/`

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
         :typoscript:`EXT:ajaxselectlist/Resources/Private/Templates/`

.. _settings.typeNum:

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
