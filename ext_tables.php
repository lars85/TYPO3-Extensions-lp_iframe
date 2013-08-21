<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

$extensionName = t3lib_div::underscoredToUpperCamelCase($_EXTKEY);

/**
 * Add setup.txt / constants.txt to static files selection in template records
 */
t3lib_extMgm::addStaticFile(
	$_EXTKEY,
	'Configuration/TypoScript',
	'LP iFrame'
);

/**
 * Add Plugin
 */
$pluginName = 'pi1';
$pluginSignatureList = strtolower($extensionName) . '_' . $pluginName;

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	$pluginName,
	'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_flexform.xml:' . $pluginName,
	'EXT:' . $_EXTKEY . '/ext_icon.gif'
);

$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignatureList] = 'layout,select_key,pages,recursive';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignatureList] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue(
	$pluginSignatureList, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_' . $pluginName .'.xml'
);

t3lib_extMgm::addLLrefForTCAdescr(
	'tt_content.pi_flexform.lpiframe_pi1.list',
	'EXT:lp_iframe_f4x/Resources/Private/Language/locallang_csh_flexform.xml'
);