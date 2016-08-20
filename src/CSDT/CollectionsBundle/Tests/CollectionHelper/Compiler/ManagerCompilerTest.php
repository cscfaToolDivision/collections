<?php
/**
 * This file is part of the Hephaistos project management API.
 * 
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 5.6
 *
 * @category Test
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CollectionsBundle\Tests\CollectionHelper\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use CSDT\CollectionsBundle\CollectionHelper\Compiler\ManagerCompiler;
use CSDT\CollectionsBundle\CollectionHelper\Compiler\HelperCompiler;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Manager Compiler test
 *
 * This class test the logic of
 * the collection compilers.
 *
 * @category Test
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class ManagerCompilerTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * Test process
     * 
     * This method test the process of
     * the compiler pass.
     * 
     * @return void
     */
    public function testProcess()
    {
        $container = new ContainerBuilder();
        
        $fooCaster = new Definition(\stdClass::class);
        $fooCaster->addTag("collection.helper.caster");

        $barCaster = new Definition(\stdClass::class);
        $barCaster->addTag("collection.helper.caster");

        $bazCaster = new Definition(\stdClass::class);
        $bazCaster->addTag("collection.helper.caster");
        
        $container->setDefinition('foo.caster', $fooCaster);
        $container->setDefinition('bar.caster', $barCaster);
        $container->setDefinition('baz.caster', $bazCaster);
        
        $fooManager = new Definition(\stdClass::class);
        $fooManager->addTag("collection.helper.manager");
        $container->setDefinition('foo.manager', $fooManager);
        
        $fooHelper = new Definition(\stdClass::class);
        $fooHelper->addTag("collection.helper.helper");
        $container->setDefinition('foo.helper', $fooHelper);
        
        $container->addCompilerPass(new ManagerCompiler())
            ->addCompilerPass(new HelperCompiler());
        
        $container->compile();
        
        $fooCasterSetted = $this->serviceHasCall(
            "foo.manager",
            $container,
            "addCaster",
            "foo.caster"
        );
        
        $barCasterSetted = $this->serviceHasCall(
            "foo.manager",
            $container,
            "addCaster",
            "bar.caster"
        );
        
        $bazCasterSetted = $this->serviceHasCall(
            "foo.manager",
            $container,
            "addCaster",
            "baz.caster"
        );
        
        $format = "The %s compiler is expected to register the %s tagged services";
        
        $message = sprintf($format, "manager", "caster");
        $this->assertTrue($fooCasterSetted, $message);
        $this->assertTrue($barCasterSetted, $message);
        $this->assertTrue($bazCasterSetted, $message);
        
        $fooManagerSetted = $this->serviceHasCall(
            "foo.helper",
            $container,
            "setCasterManager",
            "foo.manager"
        );

        $message = sprintf($format, "helper", "manager");
        $this->assertTrue($fooManagerSetted, $message);
        
        $fooUnexpectedSetted = $this->serviceHasCall(
            "foo.helper",
            $container,
            "setCasterManager",
            "foo.unexpected"
        );

        $format = "The %s compiler is expected to escape the %s tagged services";
        $message = sprintf($format, "helper", "unexpected");
        $this->assertFalse($fooUnexpectedSetted, $message);
    }
    
    /**
     * Service has call
     * 
     * This method check if the given service
     * contain the specified call method with
     * the given service name as argument.
     * 
     * @param string           $name        The main service name
     * @param ContainerBuilder $container   The container builder
     * @param string           $method      The method to call
     * @param string           $serviceName The injected service name
     * 
     * @return                     boolean
     * @codingStandardsIgnoreStart
     */
    private function serviceHasCall(
        $name,
        ContainerBuilder $container,
        $method,
        $serviceName
    ) {
        // @codingStandardsIgnoreEnd
        $definition = $container->findDefinition($name);
        return $this->hasCallWith($definition, $method, $serviceName);
    }
    
    /**
     * Has call with
     * 
     * This method check if the given service
     * definition contain the specified call
     * method with the given service name as
     * argument.
     * 
     * @param Definition $definition  The service definition
     * @param string     $method      The method name to call
     * @param string     $serviceName The injected service name
     * 
     * @return                     boolean
     * @codingStandardsIgnoreStart
     */
    private function hasCallWith(Definition $definition, $method, $serviceName) 
    {
        // @codingStandardsIgnoreEnd
        if ($definition->hasMethodCall($method)) {
            foreach ($definition->getMethodCalls() as $call) {
                list($callMethod, $callArguments) = $call;
                if ($callMethod == $method 
                    && array_search(
                        $serviceName,
                        $this->getNames($callArguments)
                    ) !== false
                ) {
                    return true;
                }
            }
        }
        
        return false;
    }
    
    /**
     * Get names
     * 
     * This method export the name of
     * the given references.
     * 
     * @param array $references An array of reference to inspect
     * 
     * @return                     string[]
     * @codingStandardsIgnoreStart
     */
    private function getNames(array $references)
    {
        // @codingStandardsIgnoreEnd
        $names = array();
        $test = $this;
        
        array_walk(
            $references,
            function ($reference) use (&$names, $test) {
                $names[] = $test->getReferenceId($reference);
            }
        );
        
        return $names;
    }
    
    /**
     * Get reference id
     * 
     * This method export the service id from
     * a reference.
     * 
     * @param Reference $reference A reference to inspect
     * 
     * @return                     string
     * @codingStandardsIgnoreStart
     */
    private function getReferenceId(Reference $reference)
    {
        // @codingStandardsIgnoreEnd
        $reflection = new \ReflectionClass($reference);
        $property = $reflection->getProperty("id");
        $property->setAccessible(true);
        
        return $property->getValue($reference);
    }
    
}
