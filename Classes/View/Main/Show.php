<?php

namespace LarsPeipmann\LpIframe\View\Main;

/**
 * The main controller for the page backend module.
 *
 * @package LpIframe
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Show extends \TYPO3\CMS\Extbase\Mvc\View\AbstractView
{

    /**
     * @var \LarsPeipmann\LpIframe\Service\ConfigurationManager
     * @inject
     */
    protected $configurationManager;

    /**
     * Renders the view
     *
     * @return string
     */
    public function render()
    {
        $attributes = $this->variables['attributes'];

        /** @var $contentObject \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer */
        $contentObject = $this->variables['contentObject'];

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

        $extensionTypoScript = $this->configurationManager->getExtensionConfiguration();
        if (!empty($extensionTypoScript['renderObj']) && !empty($extensionTypoScript['renderObj.'])) {
            $content = $contentObject->cObjGetSingle(
                $extensionTypoScript['renderObj'],
                $extensionTypoScript['renderObj.']
            );
        } else {
            $content = 'Please inlcude TypoScript static files (setup.txt and constants.txt) of lp_iframe extension.';
        }

        return $content;
    }
}