<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

$extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);

/**
 * Add setup.txt / constants.txt to static files selection in template records
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
	$_EXTKEY,
	'Configuration/TypoScript',
	'LP iFrame'
);

/**
 * Add Plugin
 */
$pluginName = 'pi1';
$pluginSignatureList = strtolower($extensionName) . '_' . $pluginName;

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	$pluginName,
	'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_flexform.xlf:' . $pluginName,
	'EXT:' . $_EXTKEY . '/ext_icon.gif'
);

$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignatureList] = 'layout,select_key,pages,recursive';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignatureList] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	$pluginSignatureList, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_' . $pluginName .'.xml'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'tt_content.pi_flexform.lpiframe_pi1.list',
	'EXT:lp_iframe/Resources/Private/Language/locallang_csh_flexform.xlf'
);