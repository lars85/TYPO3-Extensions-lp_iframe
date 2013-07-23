<?php

namespace LarsPeipmann\LpIframe\Controller;

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

class MainController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * Initializes the controller before invoking an action method.
	 *
	 * @return void
	 */
	protected function initializeAction() {
		// Replace old pattern with new one (new pattern comes with Extbase 6.2)
		if (!preg_match('/\\\/', $this->viewObjectNamePattern)) {
			$this->viewObjectNamePattern = 'LarsPeipmann\@extension\View\@controller\@action@format';
		}
	}

	/**
	 * Show action
	 *
	 * Assigns FlexForm data to the view.
	 *
	 * @return void
	 */
	public function showAction() {
		$this->view->assignMultiple(
			array(
				'attributes' => $this->settings['attributes'],
				'options' => $this->settings['options'],
			)
		);
	}
}