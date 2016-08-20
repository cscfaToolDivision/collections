<?php
/**
 * This file is part of the Hephaistos project management API.
 * 
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 5.6
 *
 * @category Bundle
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CollectionsBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use CSDT\CollectionsBundle\CollectionHelper\Compiler\ManagerCompiler;
use CSDT\CollectionsBundle\CollectionHelper\Compiler\HelperCompiler;

/**
 * CSDT collections bundle
 *
 * This bundle provide base class for perform
 * php collections.
 *
 * @category           Bundle
 * @package            Hephaistos
 * @author             matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license            MIT <https://opensource.org/licenses/MIT>
 * @link               http://cscfa.fr
 * @codeCoverageIgnore
 */
class CSDTCollectionsBundle extends Bundle
{

    /**
     * Builds the bundle.
     *
     * It is only ever called once when the cache is empty.
     *
     * This method can be overridden to register compilation passes,
     * other extensions, ...
     *
     * @param ContainerBuilder $container A ContainerBuilder instance
     * 
     * @return void
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        
        $container->addCompilerPass(new ManagerCompiler());
        $container->addCompilerPass(new HelperCompiler());
    }
}
