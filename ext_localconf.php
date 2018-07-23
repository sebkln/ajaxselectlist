<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Sebkln.' . $_EXTKEY,
    'Selectlist',
    array(
        'OptionRecord' => 'list, ajaxCall',

    ),
    // non-cacheable actions
    array(
        'OptionRecord' => '',

    )
);
