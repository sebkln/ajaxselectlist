<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'ajaxselectlist',
    'Configuration/TypoScript',
    'Select list with Ajax call'
);
