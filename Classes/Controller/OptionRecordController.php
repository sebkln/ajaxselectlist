<?php
namespace Sebkln\Ajaxselectlist\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Sebastian Klein <sebastian@sklein-medien.de>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

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