<?php
namespace Sebkln\Ajaxselectlist\Controller;

/*
 * This file is part of the package sebkln/ajaxselectlist
 *
 * Copyright (c) 2016 Sebastian Klein <sebastian@sebkln.de>
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * OptionRecordController
 */
class OptionRecordController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * optionRecordRepository
     *
     * @var \Sebkln\Ajaxselectlist\Domain\Repository\OptionRecordRepository
     * @inject
     */
    protected $optionRecordRepository = NULL;
    
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $optionRecords = $this->optionRecordRepository->findAll();
        $this->view->assign('optionRecords', $optionRecords);
        $this->view->assign("currentPageID", $GLOBALS['TSFE']->id);

        // Check if the given TYPO3 uses the new language aspect (since TYPO3 9.4):
        if (\TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(TYPO3_version) >= 9004000) {
            $languageAspect = GeneralUtility::makeInstance(Context::class)->getAspect('language');
            $lang = $languageAspect->getId();
            $this->view->assign("sysLanguageUid", $lang);
        } else {
            $this->view->assign("sysLanguageUid", $GLOBALS['TSFE']->sys_language_uid);
        }
    }

    /**
     * action ajaxCall
     *
     * @param \Sebkln\Ajaxselectlist\Domain\Model\OptionRecord $optionRecord
     * @return void
     */
    public function ajaxCallAction(\Sebkln\Ajaxselectlist\Domain\Model\OptionRecord $optionRecord)
    {
        $this->view->assign('optionRecord', $optionRecord);
    }
}