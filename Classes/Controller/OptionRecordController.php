<?php
namespace Sebkln\Ajaxselectlist\Controller;

/*
 * This file is part of the package sebkln/ajaxselectlist
 *
 * Copyright (c) 2016 Sebastian Klein <sebastian@sklein-medien.de>
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

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
        $this->view->assign("sysLanguageUid", $GLOBALS['TSFE']->sys_language_uid);
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