<?php
defined('TYPO3_MODE') or die();

if (\TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(TYPO3_version) >= 9000000) {
    // Adapt generalTab label which moved in TYPO3 v9:
    $GLOBALS['TCA']['tx_ajaxselectlist_domain_model_optionrecord']['types']['0']['showitem'] = '
        --div--;LLL:EXT:core/Resources/Private/Language/locallang_core.xlf:labels.generalTab,
            title,text,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,
            image,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.imagelinks;imagelinks,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.language,
            --palette--;;language,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access,
            --palette--;;visibility,
            --palette--;;timeRestriction,
    ';
}
