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

use CSDT\CollectionsBundle\AbstractCollections\AbstractContainerCollection;

/**
 * Abstract container collection test
 *
 * This class is used to test the features of
 * the Abstract container collection.
 *
 * @category Test
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class AbstractContainerCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test instance
     * 
     * This property store the instance
     * to be tested.
     * 
     * @var \PHPUnit_Framework_MockObject_MockObject|AbstractContainerCollection
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
        $class = AbstractContainerCollection::class;
        $this->testInstance = $this->getMockForAbstractClass($class);
    }
    
    /**
     * Test get subset
     * 
     * This method test the get subset support
     * of the Container collections.
     * 
     * @return void
     */
    public function testGetSubset()
    {
        $class = AbstractContainerCollection::class;
        
        $mock = clone $this->testInstance;
        $mock->setAll(array("key51"=>"value51"));
        
        $array = array(
            "key1" => "value1",
            "key2" => "value2",
            "key3" => "value3",
            "key4" => array(
                "key41" => "value41",
                "key42" => "value42"
            ),
            "key5" => $mock
        );
        
        $this->testInstance->setAll($array);
        
        foreach (array_keys($array) as $key) {
            $this->assertInstanceOf(
                $class,
                $this->testInstance->getSubset($key),
                sprintf(
                    "The instance of %s is expected to return".
                    " instance of %s when the method %s is called",
                    $class,
                    $class,
                    "getSubset"
                )
            );
        }

        $this->assertTrue(
            empty($this->testInstance->getSubset("key1")->toArray()),
            sprintf(
                "The instance of %s is expected to".
                " return an empty subset for the key %s".
                " containing %s",
                $class,
                "key1",
                json_encode($array["key1"])
            )
        );
        $this->assertTrue(
            empty($this->testInstance->getSubset("key2")->toArray()),
            sprintf(
                "The instance of %s is expected to".
                " return an empty subset for the key %s".
                " containing %s",
                $class,
                "key2",
                json_encode($array["key2"])
            )
        );
        $this->assertTrue(
            empty($this->testInstance->getSubset("key3")->toArray()),
            sprintf(
                "The instance of %s is expected to".
                " return an empty subset for the key %s".
                " containing %s",
                $class,
                "key3",
                json_encode($array["key3"])
            )
        );
        $this->assertFalse(
            empty($this->testInstance->getSubset("key4")->toArray()),
            sprintf(
                "The instance of %s is expected to".
                " return an hydrated subset for the key %s".
                " containing %s",
                $class,
                "key4",
                json_encode($array["key4"])
            )
        );
        $this->assertFalse(
            empty($this->testInstance->getSubset("key5")->toArray()),
            sprintf(
                "The instance of %s is expected to".
                " return an hydrated subset for the key %s".
                " containing %s",
                $class,
                "key5",
                json_encode($array["key5"])
            )
        );
    }
    
}
