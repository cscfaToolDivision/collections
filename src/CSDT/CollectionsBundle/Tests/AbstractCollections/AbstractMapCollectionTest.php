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
namespace CSDT\CollectionsBundle\Tests\AbstractCollections;

use CSDT\CollectionsBundle\AbstractCollections\AbstractMapCollection;

/**
 * Abstract map collection test
 *
 * This class is used to perform the test
 * of the abstract map collection.
 *
 * @category Test
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class AbstractMapCollectionTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * Test instance
     * 
     * This property store the instance
     * to be tested.
     * 
     * @var \PHPUnit_Framework_MockObject_MockObject|AbstractMapCollection
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
        $instance = $this->getMockForAbstractClass(AbstractMapCollection::class);
        
        $this->testInstance = $instance;
    }
    
    /**
     * Test has
     *
     * This method test the has method support
     * of the AbstractMapCollection class.
     * 
     * @return void
     */
    public function testHas()
    {
        $format = "The instance of %s".
            " is expected to return %s".
            " when the method %s".
            " is called and the key %s";
        
        $reflectionClass = new \ReflectionClass($this->testInstance);
        $property = $reflectionClass->getProperty("content");
        
        $property->setAccessible(true);
        
        $this->assertFalse(
            $this->testInstance->has("key"),
            sprintf(
                $format,
                AbstractMapCollection::class,
                "false",
                "has",
                "does not exist"
            )
        );
        
        $property->setValue($this->testInstance, array("key"=>"test"));
        
        $this->assertTrue(
            $this->testInstance->has("key"),
            sprintf(
                $format,
                AbstractMapCollection::class,
                "TRUE",
                "has",
                "exist"
            )
        );
    }
    
    /**
     * Test has
     *
     * This method test the get method support
     * of the AbstractMapCollection class.
     *
     * @return void
     */
    public function testGet()
    {
        $format = "The instance of %s".
            " is expected to return %s".
            " when the method %s".
            " is called and the key %s";
        
        $reflectionClass = new \ReflectionClass($this->testInstance);
        $property = $reflectionClass->getProperty("content");
        
        $property->setAccessible(true);
        
        $this->assertNull(
            $this->testInstance->get("key"),
            sprintf(
                $format,
                AbstractMapCollection::class,
                "null",
                "get",
                "does not exist"
            )
        );
        
        $property->setValue($this->testInstance, array("key"=>"test"));
        
        $this->assertEquals(
            "test",
            $this->testInstance->get("key"),
            sprintf(
                $format,
                AbstractMapCollection::class,
                "'test'",
                "get",
                "exist"
            )
        );
    }
    
    /**
     * Test set
     *
     * This method test the set method support
     * of the AbstractMapCollection class.
     *
     * @return void
     */
    public function testSet()
    {
        $format = "The instance of %s".
            " is expected to%s contain %s";
        
        $complement = " after the method %s is called";
        
        $reflectionClass = new \ReflectionClass($this->testInstance);
        $property = $reflectionClass->getProperty("content");
        
        $property->setAccessible(true);
        
        $this->assertFalse(
            array_key_exists("key", $property->getValue($this->testInstance)),
            sprintf(
                $format,
                AbstractMapCollection::class,
                "not",
                "the key 'key'"
            )
        );
        
        $this->assertSame(
            $this->testInstance,
            $this->testInstance->set("key", "value"),
            sprintf(
                "The instance of %s".
                    " is expected to return %s".
                    " when the method %s is called",
                AbstractMapCollection::class,
                "itself",
                "set"
            )
        );
        
        $this->assertTrue(
            array_key_exists("key", $property->getValue($this->testInstance)),
            sprintf(
                $format.$complement,
                AbstractMapCollection::class,
                "",
                "the key 'key'",
                "set"
            )
        );
        
        $this->assertEquals(
            'value',
            $property->getValue($this->testInstance)['key'],
            sprintf(
                $format.$complement,
                AbstractMapCollection::class,
                "",
                "the value 'value'",
                "set"
            )
        );
    }
    
    /**
     * Test remove
     *
     * This method test the remove method support
     * of the AbstractMapCollection class.
     *
     * @return void
     */
    public function testRemove()
    {
        $format = "The instance of %s".
            " is expected to not contain %s".
            " after the method %s is called";
        
        $reflectionClass = new \ReflectionClass($this->testInstance);
        $property = $reflectionClass->getProperty("content");
        
        $property->setAccessible(true);
        $property->setValue($this->testInstance, array('key'=> 'value'));
        
        $this->assertEquals(
            'value',
            $this->testInstance->remove("key"),
            sprintf(
                "The instance of %s".
                    " is expected to return %s".
                    " when the method %s is called",
                AbstractMapCollection::class,
                "'value'",
                "remove"
            )
        );
        
        $this->assertTrue(
            empty($property->getValue($this->testInstance)),
            sprintf(
                $format,
                AbstractMapCollection::class,
                "'key'",
                "remove"
            )
        );
    }


    /**
     * Test set all
     *
     * This method test the set all method support
     * of the AbstractMapCollection class.
     *
     * @return void
     */
    public function testSetAll()
    {
        $arrayFirst = array("test"=> "value");
        $arraySecond = array(
            "test2"=> "value2",
            "test3"=> "value3"
        );
        
        $reflectionClass = new \ReflectionClass($this->testInstance);
        $property = $reflectionClass->getProperty("content");
        
        $property->setAccessible(true);

        $this->assertSame(
            $this->testInstance,
            $this->testInstance->setAll($arrayFirst),
            sprintf(
                "The instance of %s".
                " is expected to return %s".
                " when the method %s is called",
                AbstractMapCollection::class,
                "itself",
                "setAll"
            )
        );
        
        $this->assertEquals(
            $arrayFirst,
            $property->getValue($this->testInstance),
            sprintf(
                "The instance of %s is expected to contain %s".
                    " after the method %s is called",
                AbstractMapCollection::class,
                json_encode($arrayFirst),
                "setAll"
            )
        );
        
        $this->assertSame(
            $this->testInstance,
            $this->testInstance->setAll($arraySecond),
            sprintf(
                "The instance of %s".
                    " is expected to return %s".
                    " when the method %s is called",
                AbstractMapCollection::class,
                "itself",
                "set"
            )
        );
        
        $this->assertEquals(
            array_merge(
                $arrayFirst,
                $arraySecond
            ),
            $property->getValue($this->testInstance),
            sprintf(
                "The instance of %s is expected to contain %s".
                    " after the method %s is called",
                AbstractMapCollection::class,
                json_encode(array_merge($arrayFirst, $arraySecond)),
                "setAll"
            )
        );
    }
    
    /**
     * Test remove all
     *
     * This method test the set all method support
     * of the AbstractMapCollection class.
     *
     * @return void
     */
    public function testRemoveAll()
    {
        $arrayFirst = array("test"=> "value");
        $arraySecond = array(
            "test2"=> "value2",
            "test3"=> "value3"
        );
        
        $reflectionClass = new \ReflectionClass($this->testInstance);
        $property = $reflectionClass->getProperty("content");
        
        $property->setAccessible(true);
        $property->setValue(
            $this->testInstance,
            array_merge($arrayFirst, $arraySecond)
        );
        
        $this->assertEquals(
            $arraySecond,
            $this->testInstance->removeAll(array_keys($arraySecond)),
            sprintf(
                "The instance of %s is expected to return %s".
                    " when the method %s is called with arguments %s",
                AbstractMapCollection::class,
                json_encode($arraySecond),
                "removeAll",
                json_encode(array_keys($arraySecond))
            )
        );
        $this->assertEquals(
            $arrayFirst,
            $property->getValue($this->testInstance),
            sprintf(
                "The instance of %s is expected to contain %s".
                    " after the method %s is called with arguments %s",
                AbstractMapCollection::class,
                json_encode($arrayFirst),
                "removeAll",
                json_encode(array_keys($arraySecond))
            )
        );
        $this->assertEquals(
            $arrayFirst,
            $this->testInstance->removeAll(array_keys($arrayFirst)),
            sprintf(
                "The instance of %s is expected to return %s".
                    " when the method %s is called with arguments %s",
                AbstractMapCollection::class,
                json_encode($arrayFirst),
                "removeAll",
                json_encode(array_keys($arrayFirst))
            )
        );
        $this->assertTrue(
            empty($property->getValue($this->testInstance)),
            sprintf(
                "The instance of %s is expected to contain %s".
                    " after the method %s is called with arguments %s",
                AbstractMapCollection::class,
                json_encode(array()),
                "removeAll",
                json_encode(array_keys($arraySecond))
            )
        );
    }
}
