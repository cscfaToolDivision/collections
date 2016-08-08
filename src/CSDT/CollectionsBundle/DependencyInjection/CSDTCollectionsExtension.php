<?php
/**
 * This file is part of the Hephaistos project management API.
 * 
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 5.6
 *
 * @category Extension
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CollectionsBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * CSDT Collection extension
 *
 * This is the class that loads and manages
 * the CSDTCollectionsBundle configuration.
 *
 * @category           Extension
 * @package            Hephaistos
 * @author             matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license            MIT <https://opensource.org/licenses/MIT>
 * @link               http://cscfa.fr
 * @codeCoverageIgnore
 */
class CSDTCollectionsExtension extends Extension
{
    /**
     * Loads a specific configuration.
     *
     * @param array            $configs   An array of configuration values
     * @param ContainerBuilder $container A ContainerBuilder instance
     *
     * @return void
     * @throws \InvalidArgumentException When provided tag is not
     *                                   defined in this extension
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $this->processConfiguration($configuration, $configs);

        $fileLocator = new FileLocator(__DIR__.'/../Resources/config');
        $loader = new Loader\YamlFileLoader($container, $fileLocator);
        $loader->load('services.yml');
    }
}
