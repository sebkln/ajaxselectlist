.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _configuration-templates:

Changing Templates
==================

This extension provides you with basic Fluid templates. These are meant as examples, as you'll want to adapt the output to your website's design. As in every Extbase extension, the Fluid templates, partials and layouts are located in the directory ``Resources/Private/``.

- ``List.html`` outputs the select menu and also contains the Ajax script.
- ``AjaxCall.html`` displays the content of your records. It provides an example of how you can render the image.

You can just copy this templates to your *fileadmin* directory (or even better, an extension that holds all your website's templates) and set the paths to the new location.

.. warning::

   **Never** alter the templates directly inside the extension directory, as they would be overwritten when updating the extension!

There is a **fallback** mode for the ``templateRootPaths``, ``partialRootPaths`` and ``layoutRootPaths``. If the array keys are numeric, they are first sorted and then tried in reversed order. That means: if a template isn't found in the path with key ``2``, TYPO3 searches in ``1`` and eventually in ``0``. This way you only have to copy your customized files and ignore the other templates – unless you want to alter them, too.

You can either use the Typoscript Constants or TypoScript Setup to set the path to your altered templates:

Change the templates using TypoScript Constants
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

.. code-block:: typoscript

	plugin.tx_ajaxselectlist {
	    view {
	        templateRootPath =
	        partialRootPath =
	        layoutRootPath =
	    }

You can add your file paths here, like *EXT:my_custom_templates/Resources/Private/Templates/ajaxselectlist/* or *fileadmin/templates/ajaxselectlist/*. Any template that cannot be found in these paths is taken from the extension's original source (see fallback in Setup below).

Change the templates using TypoScript Setup
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

.. code-block:: typoscript

	plugin.tx_ajaxselectlist {
	    view {
	        templateRootPaths {
	            0 = EXT:ajaxselectlist/Resources/Private/Templates/
	            1 = {$plugin.tx_ajaxselectlist.view.templateRootPath}
	        }

	        partialRootPaths {
	            0 = EXT:ajaxselectlist/Resources/Private/Partials/
	            1 = {$plugin.tx_ajaxselectlist.view.partialRootPath}
	        }

	        layoutRootPaths {
	            0 = EXT:ajaxselectlist/Resources/Private/Layouts/
	            1 = {$plugin.tx_ajaxselectlist.view.layoutRootPath}
	        }
	    }
	}

You can overwrite the default template paths by using any number higher than ``0``.

If you want to use different templates on some subpage of your website, you can just set a new path with higher number for this page.

Example
"""""""

.. code-block:: typoscript

	plugin.tx_ajaxselectlist {
	    view {
	        templateRootPaths {
	            0 = EXT:ajaxselectlist/Resources/Private/Templates/
	            1 = {$plugin.tx_ajaxselectlist.view.templateRootPath}
	            2 = EXT:my_custom_templates/Resources/Private/Templates/ajaxselectlist/
	        }
	    }
	}

	// different template for a single page:
	[globalVar = TSFE:id=17]
	plugin.tx_ajaxselectlist {
	    view {
	        templateRootPaths {
	            3 = EXT:my_custom_templates/Resources/Private/Templates/ajaxselectlist_alternative/
	        }
	    }
	}
	[global]

.. important::

   Please remember to use the subfolder **OptionRecord** (named after the Object Model) for your templates!

   For example, if you use :typoscript:`plugin.tx_ajaxselectlist.view.templateRootPath = fileadmin/Templates/selectlist/`, the *List.html* and *AjaxCall.html* must be inside ``fileadmin/Templates/selectlist/OptionRecord/``.

