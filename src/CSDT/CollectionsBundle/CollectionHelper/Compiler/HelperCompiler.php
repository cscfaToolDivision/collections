<?php
/**
 * This file is part of the Hephaistos project management API.
 * 
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 5.6
 *
 * @category Compiler
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CollectionsBundle\CollectionHelper\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Helper compiler
 *
 * This class is used to process
 * the container for the manager
 * import into the helper.
 *
 * @category Compiler
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class HelperCompiler implements CompilerPassInterface
{
    
    /**
     * Process
     * 
     * This method process the container
     * to inject the manager into the
     * collection helper.
     * 
     * @param ContainerBuilder $container The application container builder
     *
     * @return void
     */
    public function process(ContainerBuilder $container)
    {
        $helper = 'collection.helper.helper';
        $manager = 'collection.helper.manager';
        $method = 'setCasterManager';

        $taggedhelper = $container->findTaggedServiceIds($helper);
        foreach ($taggedhelper as $helperId => $tags) {
            $helperDefinition = $container->findDefinition($helperId);

            $taggedServices = $container->findTaggedServiceIds($manager);
            
            foreach ($taggedServices as $id => $tags) {
                $helperDefinition->addMethodCall(
                    $method,
                    array(new Reference($id))
                );
            }
        }
    }

}
