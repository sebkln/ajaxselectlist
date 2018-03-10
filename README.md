# ajaxselectlist (TYPO3 Extension)

## Preface

You can find a more detailed documentation including several screenshots and how-tos on [docs.typo3.org](https://docs.typo3.org/typo3cms/extensions/ajaxselectlist/) (HTML) and in the `Documentation/` folder (ReST).


## What does it do?

This extension provides a drop-down list which uses Ajax to load records into the page without reloading the website.

* potential uses: for instance listing of employees or branch stores
* use title, richtext and multimedia assets (images, videos, ...)
* support of both RTE extensions (rtehtmlarea and rte_ckeditor)
* multilanguage support
* based on Extbase and Fluid
* easy installation
* fully functional, but basic Fluid templates without further styling, because:
* the templates are meant for customization! Simply adapt them to your specific design and needs.
* depends on jQuery (the Ajax request could be rewritten to vanilla JavaScript, though)


## Compatibility

TYPO3 7.6.0 - 8.7.99


## Installation

To install the extension, perform the following steps:
   
1. Go to the Extension Manager
2. Load and install the extension
3. Include the static template Select list with Ajax call (ajaxselectlist) into your TypoScript template
4. Add permissions for the plugin and records for your editors

> Note: The Ajax request that loads the records depends on jQuery. You have to include jQuery in your website if not already done. This extension does not implement jQuery for you.
> If you know JavaScript you can just use XMLHttpRequest() and ignore jQuery. The JavaScript is part of the List.html template.
