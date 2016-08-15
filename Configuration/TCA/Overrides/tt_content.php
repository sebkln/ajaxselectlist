<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['ajaxselectlist_selectlist'] = 'layout,select_key,linkToTop';
