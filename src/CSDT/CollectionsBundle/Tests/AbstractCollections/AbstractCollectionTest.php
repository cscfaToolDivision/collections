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

use CSDT\CollectionsBundle\AbstractCollections\AbstractCollection;

/**
 * Abstract collection test
 *
 * This class is used to test the
 * abstract collection class.
 *
 * @category Test
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class AbstractCollectionTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * Test instance
     * 
     * This property store the instance
     * to be tested.
     * 
     * @var \PHPUnit_Framework_MockObject_MockObject|AbstractCollection
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
        $instance = $this->getMockForAbstractClass(AbstractCollection::class);
        
        $this->testInstance = $instance;
    }
    
    /**
     * Test get iterator
     * 
     * This method test the get iterator method
     * of the abstract collection class.
     * 
     * @return void
     */
    public function testGetIterator()
    {
        $reflector = new \ReflectionClass($this->testInstance);
        $contentProperty = $reflector->getProperty("content");
        
        $contentProperty->setAccessible(true);
        $contentProperty->setValue(
            $this->testInstance, array(
            12,
            "test"
            )
        );
        
        $format = "The instance of %s".
            " is expected to return an instance of %s".
            " when the %s method is called";
        
        $this->assertInstanceOf(
            \ArrayIterator::class,
            $this->testInstance->getIterator(),
            sprintf(
                $format,
                AbstractCollection::class,
                \ArrayIterator::class,
                "getIterator"
            )
        );
    }
    
    /**
     * Test numberized
     * 
     * This method test the numberization methods
     * of the abstract collection class.
     * 
     * @return void
     */
    public function testNumberized()
    {
        $format = "The instance of %s".
            " is expected to return %s".
            " when the %s method is called".
            " when the content is %s";
        
        $this->assertTrue(
            $this->testInstance->isEmpty(),
            sprintf(
                $format,
                AbstractCollection::class,
                "true",
                "isEmpty",
                "empty"
            )
        );
        $this->assertEquals(
            0,
            $this->testInstance->count(),
            sprintf(
                $format,
                AbstractCollection::class,
                "0",
                "count",
                "empty"
            )
        );
        
        $reflector = new \ReflectionClass($this->testInstance);
        $contentProperty = $reflector->getProperty("content");
        
        $contentProperty->setAccessible(true);
        $contentProperty->setValue(
            $this->testInstance, array(
            12,
            "test"
            )
        );
        
        $this->assertFalse(
            $this->testInstance->isEmpty(),
            sprintf(
                $format,
                AbstractCollection::class,
                "false",
                "isEmpty",
                "[12, 'test']"
            )
        );
        $this->assertEquals(
            2,
            $this->testInstance->count(),
            sprintf(
                $format,
                AbstractCollection::class,
                "2",
                "count",
                "[12, 'test']"
            )
        );
    }
    
    /**
     * Test clear
     * 
     * This method is used to test the clearing
     * methods of the abstract collection class.
     * 
     * @return void
     */
    public function testClear()
    {
        $reflector = new \ReflectionClass($this->testInstance);
        $contentProperty = $reflector->getProperty("content");
        
        $contentProperty->setAccessible(true);
        $contentProperty->setValue(
            $this->testInstance, array(
            12,
            "test"
            )
        );
        
        $format = "The instance of %s".
            " is expected to return the same result".
            " as the %s method".
            " when the %s method is called";
        
        $this->assertEquals(
            $this->testInstance->toArray(),
            $this->testInstance->clear(),
            sprintf(
                $format,
                AbstractCollection::class,
                "toArray",
                "clear"
            )
        );
        
        $finalResult = $contentProperty->getValue($this->testInstance);


        $format = "The instance of %s".
                " is expected to contain an empty set".
                " after %s method calling";
        
        $this->assertTrue(
            empty($finalResult),
            sprintf(
                $format,
                AbstractCollection::class,
                "clear"
            )
        );
    }
    
    /**
     * Test container
     * 
     * This method is used to test the contain
     * methods support of the abstract collection
     * class.
     * 
     * @return void
     */
    public function testContainer()
    {
        $reflector = new \ReflectionClass($this->testInstance);
        $contentProperty = $reflector->getProperty("content");
        
        $contentProperty->setAccessible(true);
        $contentProperty->setValue(
            $this->testInstance, array(
            12,
            "test"
            )
        );
        
        $format = "The instance of %s".
            " is expected to return %s".
            " when the %s method is called".
            " with the %s content and the %s".
            " arguments";
        
        $this->assertTrue(
            $this->testInstance->contain(12),
            sprintf(
                $format,
                AbstractCollection::class,
                "true",
                "contain",
                "[12, 'test']",
                "[12]"
            )
        );
        $this->assertTrue(
            $this->testInstance->contain("test"),
            sprintf(
                $format,
                AbstractCollection::class,
                "true",
                "contain",
                "[12, 'test']",
                "['test']"
            )
        );
        
        $this->assertFalse(
            $this->testInstance->contain(13),
            sprintf(
                $format,
                AbstractCollection::class,
                "false",
                "contain",
                "[12, 'test']",
                "[13]"
            )
        );
        $this->assertFalse(
            $this->testInstance->contain("tester"),
            sprintf(
                $format,
                AbstractCollection::class,
                "false",
                "contain",
                "[12, 'test']",
                "['tester']"
            )
        );
        
        $this->assertTrue(
            $this->testInstance->containAll(array(12, "test")),
            sprintf(
                $format,
                AbstractCollection::class,
                "true",
                "containAll",
                "[12, 'test']",
                "[12, 'test']"
            )
        );
        $this->assertFalse(
            $this->testInstance->containAll(array(12, "test", 13, "tester")),
            sprintf(
                $format,
                AbstractCollection::class,
                "false",
                "containAll",
                "[12, 'test']",
                "[12, 'test', 13, 'tester']"
            )
        );
    }
    
    /**
     * Test to array
     * 
     * This method is used to test the to array
     * method of the abstract collection class.
     * 
     * @return void
     */
    public function testToArray()
    {
        $format = "The instance of %s".
            " is expected to return an array".
            " when the %s method is called";
        
        $this->assertTrue(
            is_array($this->testInstance->toArray()),
            sprintf(
                $format,
                AbstractCollection::class,
                "toArray"
            )
        );
    }
}
