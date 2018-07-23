<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Sebkln.ajaxselectlist',
    'Selectlist',
    [
        'OptionRecord' => 'list, ajaxCall',
    ],
    // non-cacheable actions
    [
        'OptionRecord' => '',
    ]
);
