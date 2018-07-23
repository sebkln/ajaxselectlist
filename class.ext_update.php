<?php
namespace Sebkln\Ajaxselectlist;

/*
 * This file is part of the package sebkln/ajaxselectlist
 *
 * Copyright (c) 2017 Sebastian Klein <sebastian@sklein-medien.de>
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Performs update tasks for extension ajaxselectlist
 */
class ext_update
{
    /**
     * @var \TYPO3\CMS\Core\Database\DatabaseConnection
     */
    protected $databaseConnection;

    /**
     * Creates the instance of the class.
     */
    public function __construct()
    {
        $this->databaseConnection = $GLOBALS['TYPO3_DB'];
    }

    /**
     * Runs the update.
     */
    public function main()
    {
        $this->updateAjaxselectlistTableStructure();

        $message = '<h2 style="color: #77a248;">The database was successfully updated.</h2>';
        $message .= '<p>Please remember to adapt your customized templates if not already done (see documentation of this extension).</p>';
        return $message;
    }

    /**
     * Checks if the Update button in the Extension Manager should be shown.
     * @return bool
     */
    public function access()
    {
        // TODO: Hide Update button if database is OK.
        return true;
    }

    /**
     * Updates ajaxselectlist table structure.
     * The code is copied almost 1:1 from RealURL's ext_update class.
     * Which seems to be a duplicate from ExtensionManagerTables class itself.
     *
     * @return void
     */
    protected function updateAjaxselectlistTableStructure()
    {
        $updateStatements = array();

        // Get all necessary statements for ext_tables.sql file
        $rawDefinitions = file_get_contents(ExtensionManagementUtility::extPath('ajaxselectlist', 'ext_tables.sql'));
        $sqlParser = GeneralUtility::makeInstance(\TYPO3\CMS\Install\Service\SqlSchemaMigrationService::class);
        $fieldDefinitionsFromFile = $sqlParser->getFieldDefinitions_fileContent($rawDefinitions);
        if (count($fieldDefinitionsFromFile)) {
            $fieldDefinitionsFromCurrentDatabase = $sqlParser->getFieldDefinitions_database();
            $diff = $sqlParser->getDatabaseExtra($fieldDefinitionsFromFile, $fieldDefinitionsFromCurrentDatabase);
            $updateStatements = $sqlParser->getUpdateSuggestions($diff);
        }

        foreach ((array)$updateStatements['add'] as $string) {
            $this->databaseConnection->admin_query($string);
        }
    }
}