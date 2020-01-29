# ajaxselectlist (TYPO3 Extension)

## Preface

You can find a more detailed documentation including several screenshots and how-tos on [docs.typo3.org](https://docs.typo3.org/p/sebkln/ajaxselectlist/master/en-us/) (HTML) and in the `Documentation/` folder (ReST).


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
* Ajax request possible with both [jQuery.ajax()](https://api.jquery.com/jquery.ajax/) and [XMLHttpRequest()](https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest).


## Compatibility

TYPO3 8.7.0 - 9.5.99


## Installation

To install the extension, perform the following steps:
   
1. Go to the Extension Manager
2. Load and install the extension
3. Include the static template Select list with Ajax call (ajaxselectlist) into your TypoScript template
4. Add permissions for the plugin and records for your editors

> Note: You can choose between an Ajax request with jQuery or vanilla JavaScript (*XMLHttpRequest*). **Default** is the jQuery solution.
> You'll need to include the jQuery library yourself!
> Please refer to the full manual for details how to switch to the XMLHttpRequest.
