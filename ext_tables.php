<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Sebkln.' . $_EXTKEY,
    'Selectlist',
    'Ajax select list'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Select list with Ajax call');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ajaxselectlist_domain_model_optionrecord', 'EXT:ajaxselectlist/Resources/Private/Language/locallang_csh_tx_ajaxselectlist_domain_model_optionrecord.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ajaxselectlist_domain_model_optionrecord');
