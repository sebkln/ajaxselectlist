.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _administrator-upgrade:

Upgrade EXT:ajaxselectlist
==========================

Upgrading from EXT:ajaxseleclist 1.0 or 2.x to 3.x
--------------------------------------------------

As Version 3.x provides several new features, it's mandatory that you perform the following tasks:

#. Add the new field for image zoom (see :ref:`updatedatabase` below)
#. Adapt your templates (see :ref:`adapttemplates` below)
#. Add *'Click-enlarge (image_zoom)'* permission for your editors (in Backend usergroup's Access Lists)
#. If you want to use a lightbox within your option records, you'll have to extend the Ajax call. See :ref:`administrator-lightbox`

Although EXT:ajaxselectlist now supports new media types (such as videos), your already used images are still properly linked in your option records.

.. _updatedatabase:

1. Update database
^^^^^^^^^^^^^^^^^^

You'll have to add the new field for image zoom. This can be achieved by any of these three options:

#. This extension provides a convenient update script that you can start within the Extension Manager. One click - done.
#. Open the Install Tool and use the Database analyzer
#. Uninstall and reinstall this extension

.. _adapttemplates:

2. Adapt your templates
^^^^^^^^^^^^^^^^^^^^^^^

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

   To benefit from all new features, you should adopt the enhancements from the new Partial *Media.html*, which is based on fluid_styled_content.
