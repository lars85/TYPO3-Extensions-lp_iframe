<?php

namespace LarsPeipmann\LpIframe\Service;

/**
 * Configuration Manager
 *
 * @package LpIframe
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class ConfigurationManager implements \TYPO3\CMS\Core\SingletonInterface
{

    /**
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManager
     * @inject
     */
    protected $configurationManager;

    /**
     * @return array
     * @throws \TYPO3\CMS\Extbase\Configuration\Exception\InvalidConfigurationTypeException
     */
    public function getExtensionConfiguration()
    {
        $setup = $this->configurationManager->getConfiguration(
            \TYPO3\CMS\Extbase\Configuration\ConfigurationManager::CONFIGURATION_TYPE_FULL_TYPOSCRIPT
        );
        return !empty($setup['plugin.']['tx_lpiframe.']) ? $setup['plugin.']['tx_lpiframe.'] : array();
    }
}