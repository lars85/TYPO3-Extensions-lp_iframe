<?php

namespace LarsPeipmann\LpIframe\Controller;

/**
 * The main controller for the page backend module.
 *
 * @package LpIframe
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class MainController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * Show action
     *
     * Assigns FlexForm data to the view.
     *
     * @return void
     */
    public function showAction()
    {
        $this->view->assignMultiple(
            array(
                'attributes' => $this->settings['attributes'],
                'options' => $this->settings['options'],
                'contentObject' => $this->configurationManager->getContentObject()
            )
        );
    }
}