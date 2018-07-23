<?php
namespace Sebkln\Ajaxselectlist\Domain\Repository;

/*
 * This file is part of the package sebkln/ajaxselectlist
 *
 * Copyright (c) 2016 Sebastian Klein <sebastian@sklein-medien.de>
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

/**
 * The repository for OptionRecords
 */
class OptionRecordRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    protected $defaultOrderings = array(
            'title' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    );
}