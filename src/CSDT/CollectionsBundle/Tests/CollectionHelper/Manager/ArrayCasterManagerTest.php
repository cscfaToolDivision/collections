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
namespace CSDT\CollectionsBundle\Tests\CollectionHelper\Manager;

use CSDT\CollectionsBundle\CollectionHelper\Manager\ArrayCasterManager;
use CSDT\CollectionsBundle\CollectionHelper\HelperInterface\ArrayCasterInterface;
use CSDT\CollectionsBundle\CollectionInterfaces\CollectionInterface;

/**
 * Array caster manager test
 *
 * This class is sed to test the
 * logic of the ArrayCasterManager
 * class.
 *
 * @category Test
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class ArrayCasterManagerTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * Test instance
     * 
     * This property store the instance
     * to be tested.
     * 
     * @var ArrayCasterManager
     */
    protected $testInstance;

    /**
     * Set up
     * 
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     * 
     * @return void
     */
    public function setUp()
    {
        $this->testInstance = new ArrayCasterManager();
    }
    
    /**
     * Test add caster
     * 
     * This method test the add caster
     * support of the array caster manager.
     * 
     * @return void
     */
    public function testAddCaster()
    {
        $mockCaster = $this->getMockForAbstractClass(ArrayCasterInterface::class);
        
        $this->assertSame(
            $this->testInstance,
            $this->testInstance->addCaster($mockCaster),
            sprintf(
                "The instance of %s is expected to return".
                " itself when the method %s is called",
                ArrayCasterManager::class,
                "addCaster"
            )
        );
    }
    
    /**
     * Test process
     * 
     * This method test the process support
     * of the Array caster manager.
     * 
     * @depends testAddCaster
     * @return  void
     */
    public function testProcess()
    {
        $mockCaster = $this->getMockForAbstractClass(ArrayCasterInterface::class);
        
        $supportType = CollectionInterface::class;
        $array = array(
            "1" => "one",
            "2" => "two"
        );
        $result = openssl_random_pseudo_bytes(3);
            
        $mockCaster->expects($this->once())
            ->method("support")
            ->with($this->equalTo($supportType))
            ->will($this->returnValue(true));
            
        $mockCaster->expects($this->once())
            ->method("toCollection")
            ->with(
                $this->equalTo($array),
                $this->equalTo($supportType)
            )->will($this->returnValue($result));
            
        $this->testInstance->addCaster($mockCaster);
        
        $this->assertSame(
            $result,
            $this->testInstance->process($array, $supportType),
            sprintf(
                "The instance of %s is expected to return".
                        " the %s instance result for the method %s",
                ArrayCasterManager::class,
                ArrayCasterInterface::class,
                "toCollection"
            )
        );
    }
    
    /**
     * Test process no caster
     * 
     * This method test the process support
     * of the Array caster manager with no
     * caster.
     * 
     * @expectedException  \ParseError
     * @depends            testAddCaster
     * @return             void
     * @codeCoverageIgnore
     */
    public function testProcessNoCaster()
    {
        $supportType = CollectionInterface::class;
        $array = array(
            "1" => "one",
            "2" => "two"
        );
            $this->testInstance->process($array, $supportType);
    }
    
    /**
     * Test process no able caster
     * 
     * This method test the process support
     * of the Array caster manager with no
     * caster able to process the collection.
     * 
     * @expectedException  \ParseError
     * @depends            testAddCaster
     * @return             void
     * @codeCoverageIgnore
     */
    public function testProcessNoAbleCaster()
    {
        $mockCaster = $this->getMockForAbstractClass(ArrayCasterInterface::class);
        
        $supportType = CollectionInterface::class;
        $array = array(
            "1" => "one",
            "2" => "two"
            );
            
        $mockCaster->expects($this->once())
            ->method("support")
            ->with($this->equalTo($supportType))
            ->will($this->returnValue(false));
        
        $this->testInstance->addCaster($mockCaster);
        $this->testInstance->process($array, $supportType);
    }
}
