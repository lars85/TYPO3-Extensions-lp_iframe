<?php

//Namespace LarsPeipmann\LpIframe\View\Main;
//class Show extends \TYPO3\CMS\Extbase\Mvc\View\AbstractView {
class Tx_LpIframe_View_Main_Show extends \TYPO3\CMS\Extbase\Mvc\View\AbstractView {
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

		foreach ($attributes as $key => $value) {
			$attributes[$key] = htmlspecialchars($value, ENT_HTML5);
		}

		$contentObject->start($attributes);

		/** @var $typoScriptObject \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController */
		$typoScriptObject = &$GLOBALS['TSFE'];
		$extensionTypoScript = $typoScriptObject->tmpl->setup['plugin.']['tx_lpiframe.'];

		$content = $contentObject->cObjGetSingle($extensionTypoScript['renderObj'], $extensionTypoScript['renderObj.']);

		return $content;
	}
}