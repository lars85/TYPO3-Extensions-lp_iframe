<?php
defined('TYPO3_MODE') || exit('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'LarsPeipmann.' . $_EXTKEY,
    'pi1',
    array(
        'Main' => 'show',
    ),
    array()
);