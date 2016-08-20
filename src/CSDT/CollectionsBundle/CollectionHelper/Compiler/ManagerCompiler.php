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
 * Manager compiler
 *
 * This class is used to process
 * the container for the casters
 * import into the manager.
 *
 * @category Compiler
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class ManagerCompiler implements CompilerPassInterface
{
    
    /**
     * Process
     * 
     * This method process the container
     * to inject the casters into the
     * caster manager.
     * 
     * @param ContainerBuilder $container The application container builder
     *
     * @return void
     */
    public function process(ContainerBuilder $container)
    {
        $manager = 'collection.helper.manager';
        $caster = 'collection.helper.caster';
        $method = 'addCaster';

        $taggedManager = $container->findTaggedServiceIds($manager);
        foreach ($taggedManager as $managerId => $tags) {
            $managerDefinition = $container->findDefinition($managerId);

            $taggedServices = $container->findTaggedServiceIds($caster);
            
            foreach ($taggedServices as $id => $tags) {
                $managerDefinition->addMethodCall(
                    $method,
                    array(new Reference($id))
                );
            }
        }
    }

}
