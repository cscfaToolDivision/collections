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
namespace CSDT\CollectionsBundle\Tests\CollectionHelper\Caster;

use CSDT\CollectionsBundle\CollectionHelper\Caster\MapCollectionCaster;
use CSDT\CollectionsBundle\Collections\MapCollection;
use CSDT\CollectionsBundle\Collections\ContainerCollection;

/**
 * Map collection caster test
 *
 * This class is used to validate the
 * MapCollectionCaster class logic.
 *
 * @category Test
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class MapCollectionCasterTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * Test instance
     * 
     * This property store the instance
     * to be tested.
     * 
     * @var MapCollectionCaster
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
        $this->testIntance = new MapCollectionCaster();
    }
    
    /**
     * Test support
     * 
     * This method test the result of
     * the support method of the
     * MapCollection caster.
     * 
     * @return void
     */
    public function testSupport()
    {
        $this->assertTrue(
            $this->testIntance->support(MapCollection::class),
            sprintf(
                "The class %s is expected to support the collection %s",
                MapCollectionCaster::class,
                MapCollection::class
            )
        );
        
        $this->assertTrue(
            $this->testIntance->support(ContainerCollection::class),
            sprintf(
                "The class %s is expected to support the collection %s",
                MapCollectionCaster::class,
                ContainerCollection::class
            )
        );
        
        $this->assertFalse(
            $this->testIntance->support(\stdClass::class),
            sprintf(
                "The class %s is not expected to support the collection %s",
                MapCollectionCaster::class,
                \stdClass::class
            )
        );
    }
    
    /**
     * Test to collection
     * 
     * This method test the to collection
     * support of the MapCollection caster.
     * 
     * @depends testSupport
     * @return  void
     */
    public function testToCollection()
    {
        $array = array(
            "test1" => "value1",
            "test2" => "value2",
            "test3" => "value3",
            "test4" => "value4"
        );
        
        $this->assertInstanceOf(
            MapCollection::class, 
            $this->testIntance->toCollection($array, MapCollection::class),
            sprintf(
                "The instance of %s is expected to".
                " return an instance of %s when the".
                " method %s is called",
                MapCollectionCaster::class,
                MapCollection::class,
                "toCollection"
            )
        );
        
        $this->assertInstanceOf(
            ContainerCollection::class, 
            $this->testIntance->toCollection($array, ContainerCollection::class),
            sprintf(
                "The instance of %s is expected to".
                " return an instance of %s when the".
                " method %s is called",
                MapCollectionCaster::class,
                ContainerCollection::class,
                "toCollection"
            )
        );
    }
    
    /**
     * Test to collection error
     * 
     * This method test the to collection support
     * of the MapCollection caster with a no
     * MapCollectionInterface child instance.
     * 
     * @expectedException  \LogicException
     * @return             void
     * @codeCoverageIgnore
     */
    public function testToCollectionError()
    {
        $this->testIntance->toCollection(array(), \stdClass::class);
    }
    
}
