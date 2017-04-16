.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _administrator-update:

Upgrade EXT:ajaxselectlist
==========================

Upgrading from EXT:ajaxseleclist 1.0 or 2.x to 3.x
--------------------------------------------------

As Version 3.x provides several new features, it's mandatory that you perform the following tasks:

#. Add the new field for image zoom, either with the Install Tool's Database analyzer or by uninstalling and reinstalling the extension
#. Adapt your templates (see below)
#. Add *'Click-enlarge (image_zoom)'* permission for your editors
#. If you want to use a lightbox within your option records, you'll have to extend the Ajax call. See :ref:`administrator-lightbox`

Adapt your templates
^^^^^^^^^^^^^^^^^^^^

Formerly used if-clause:
""""""""""""""""""""""""

.. code-block:: html

   <f:if condition="{optionRecord.image}">
       <f:image src="{optionRecord.image.originalResource.uid}"
                treatIdAsReference="1"
                alt="{optionRecord.image.originalResource.altText}"
                title="{optionRecord.image.originalResource.title}"
                width="50"/>
   </f:if>


New iteration of media:
"""""""""""""""""""""""

.. code-block:: html

   <f:for each="{optionRecord.image}" as="falmedia">
       <f:image src="{falmedia.originalResource.uid}"
                treatIdAsReference="1"
                alt="{falmedia.originalResource.altText}"
                title="{falmedia.originalResource.title}"
                maxHeight="{settings.media.image.maxHeight}"
                maxWidth="{settings.media.image.maxWidth}"/>
   </f:for>

.. tip::

   Although EXT:ajaxselectlist now supports new media types (such as videos), your already used images are still properly linked in your option records.


.. warning::

	Breaking: When updating from a former version of ajaxselectlist, you'll have to adapt your customized template! You now must use a for-Viewhelper to iterate through the various media files. Don't forget to use the name inside the as-attribute in your inner variables. See Upgrade for more information.
