<?php

namespace LarsPeipmann\LpIframe\Controller;

class MainController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
	/**
	 * @return string
	 */
	public function showAction() {
		if (empty($this->settings)) {
			return 'Please inlcude TypoScript static files (setup.txt and constants.txt) of lp_frame extension.';
		}

		$this->view
			->assign('attributes', $this->settings['attributes'])
			->assign('options', $this->settings['options']);
	}
}