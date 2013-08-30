<?php

Namespace LarsPeipmann\LpIframe\View\Main;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Lars Peipmann <Lars@Peipmann.de>
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
 * The main controller for the page backend module.
 *
 * @package LpIframe
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Show extends \TYPO3\CMS\Extbase\Mvc\View\AbstractView {
	/**
	 * Renders the view
	 *
	 * @return string
	 */
	public function render() {
		$attributes = $this->variables['attributes'];

		/** @var $contentObject \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer */
		$contentObject = &$GLOBALS['TSFE']->cObj;

		if (!empty($this->variables['options']['insertData'])) {
			foreach ($attributes as $key => $value) {
				$contentObject->start($attributes);
				$attributes[$key] = $contentObject->insertData($value);
			}
		}

		if (version_compare(PHP_VERSION, '5.4.0') >= 0) {
			foreach ($attributes as $key => $value) {
				$attributes[$key] = htmlspecialchars($value, ENT_HTML5);
			}
		}

		$contentObject->start($attributes);

		/** @var $typoScriptObject \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController */
		$typoScriptObject = &$GLOBALS['TSFE'];
		$extensionTypoScript = $typoScriptObject->tmpl->setup['plugin.']['tx_lpiframe.'];

		if (!empty($extensionTypoScript['renderObj']) && !empty($extensionTypoScript['renderObj.'])) {
			$content = $contentObject->cObjGetSingle($extensionTypoScript['renderObj'], $extensionTypoScript['renderObj.']);
		} else {
			$content = 'Please inlcude TypoScript static files (setup.txt and constants.txt) of lp_iframe extension.';
		}

		return $content;
	}
}