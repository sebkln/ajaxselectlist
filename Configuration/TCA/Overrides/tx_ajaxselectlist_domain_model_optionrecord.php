<?php
defined('TYPO3_MODE') or die();

if (\TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(TYPO3_version) >= 8007000) {
    $GLOBALS['TCA']['tx_ajaxselectlist_domain_model_optionrecord']['columns']['image']['config']['appearance']['createNewRelationLinkTitle'] = 'LLL:EXT:frontend/Resources/Private/Language/Database.xlf:tt_content.asset_references.addFileReference';
    $tca = $GLOBALS['TCA']['tx_ajaxselectlist_domain_model_optionrecord']['columns']['image']['config']['foreign_types'];
    $GLOBALS['TCA']['tx_ajaxselectlist_domain_model_optionrecord']['columns']['image']['config']['overrideChildTca']['types'] = $tca;

    unset($GLOBALS['TCA']['tx_ajaxselectlist_domain_model_optionrecord']['columns']['image']['config']['foreign_types']);
    unset($GLOBALS['TCA']['tx_ajaxselectlist_domain_model_optionrecord']['columns']['text']['defaultExtras']);

    $GLOBALS['TCA']['tx_ajaxselectlist_domain_model_optionrecord']['columns']['image']['label'] = 'LLL:EXT:frontend/Resources/Private/Language/Database.xlf:tt_content.asset_references';
}