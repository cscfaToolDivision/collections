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

use CSDT\CollectionsBundle\CollectionHelper\Caster\ValueCollectionCaster;
use CSDT\CollectionsBundle\Collections\ValueCollection;
use CSDT\CollectionsBundle\Collections\ValueSet;

/**
 * Value collection caster test
 *
 * This class is used to validate the
 * ValueCollectionCaster class logic.
 *
 * @category Test
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class ValueCollectionCasterTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * Test instance
     * 
     * This property store the instance
     * to be tested.
     * 
     * @var ValueCollectionCaster
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
        $this->testIntance = new ValueCollectionCaster();
    }
    
    /**
     * Test support
     * 
     * This method test the result of
     * the support method of the
     * ValueCollection caster.
     * 
     * @return void
     */
    public function testSupport()
    {
        $this->assertTrue(
            $this->testIntance->support(ValueCollection::class),
            sprintf(
                "The class %s is expected to support the collection %s",
                ValueCollectionCaster::class,
                ValueCollection::class
            )
        );
        
        $this->assertTrue(
            $this->testIntance->support(ValueSet::class),
            sprintf(
                "The class %s is expected to support the collection %s",
                ValueCollectionCaster::class,
                ValueSet::class
            )
        );
        
        $this->assertFalse(
            $this->testIntance->support(\stdClass::class),
            sprintf(
                "The class %s is not expected to support the collection %s",
                ValueCollectionCaster::class,
                \stdClass::class
            )
        );
    }
    
    /**
     * Test to collection
     * 
     * This method test the to collection
     * support of the ValueCollection caster.
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
            ValueCollection::class, 
            $this->testIntance->toCollection($array, ValueCollection::class),
            sprintf(
                "The instance of %s is expected to".
                " return an instance of %s when the".
                " method %s is called",
                ValueCollectionCaster::class,
                ValueCollection::class,
                "toCollection"
            )
        );
        
        $this->assertInstanceOf(
            ValueSet::class, 
            $this->testIntance->toCollection($array, ValueSet::class),
            sprintf(
                "The instance of %s is expected to".
                " return an instance of %s when the".
                " method %s is called",
                ValueCollectionCaster::class,
                ValueSet::class,
                "toCollection"
            )
        );
    }
    
    /**
     * Test to collection error
     * 
     * This method test the to collection support
     * of the ValueCollection caster with a no
     * ValueCollectionInterface child instance.
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