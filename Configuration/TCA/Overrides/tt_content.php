<?php
defined('TYPO3_MODE') or die();

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['ajaxselectlist_selectlist'] = 'layout,select_key,linkToTop';

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Sebkln.ajaxselectlist',
    'Selectlist',
    'Ajax select list'
);
