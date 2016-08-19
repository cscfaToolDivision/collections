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
namespace CSDT\CollectionsBundle\Tests\CollectionHelper\AbstractHelper;

// @codingStandardsIgnoreStart
use CSDT\CollectionsBundle\CollectionHelper\AbstractHelper\AbstractCollectionHelper;
use CSDT\CollectionsBundle\CollectionHelper\HelperInterface\ArrayCasterManagerInterface;
use CSDT\CollectionsBundle\CollectionInterfaces\CollectionInterface;
use CSDT\CollectionsBundle\Collections\ValueCollection;
use CSDT\CollectionsBundle\Collections\MapCollection;
// @codingStandardsIgnoreEnd

/**
 * Abstract collection helper test
 *
 * This class is used to test the logic of
 * the Abstract collection helper class.
 *
 * @category Test
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class AbstractCollectionHelperTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * Test instance
     * 
     * This property store the instance
     * to be tested.
     * 
     * @var \PHPUnit_Framework_MockObject_MockObject|AbstractCollectionHelper
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
        $this->testInstance = $this->getMockForAbstractClass(
            AbstractCollectionHelper::class
        );
    }
    
    /**
     * Test set caster manager
     * 
     * This method test the set caster
     * manager support of the Abstract
     * collection helper class.
     * 
     * @return void
     */
    public function testSetCasterManager()
    {
        $mockManager = $this->getMockForAbstractClass(
            ArrayCasterManagerInterface::class
        );
        
        $this->assertSame(
            $this->testInstance,
            $this->testInstance->setCasterManager($mockManager),
            sprintf(
                "The instance of %s is expected to return".
                " itself when the method %s is called",
                AbstractCollectionHelper::class,
                "setCasterManager"
            )
        );
        
        $reflection = new \ReflectionClass(AbstractCollectionHelper::class);
        $managerProperty = $reflection->getProperty("manager");
        $managerProperty->setAccessible(true);
        
        $this->assertSame(
            $mockManager,
            $managerProperty->getValue($this->testInstance),
            sprintf(
                "The instance of %s is expected to contain".
                " the given instance of %s after the method".
                " %s called",
                AbstractCollectionHelper::class,
                ArrayCasterManagerInterface::class,
                "setCasterManager"
            )
        );
    }
    
    /**
     * Test array to collection
     * 
     * This method test the casting support
     * of the Abstract collection helper.
     * 
     * @return void
     */
    public function testArrayToCollection()
    {
        $source = array();
        $collectionType = CollectionInterface::class;
        $return = openssl_random_pseudo_bytes(3);
        
        $mockManager = $this->getMockForAbstractClass(
            ArrayCasterManagerInterface::class
        );
        $mockManager->expects($this->once())
            ->method("process")
            ->with($this->equalTo($source), $this->equalTo($collectionType))
            ->will($this->returnValue($return));
            
        $reflection = new \ReflectionClass(AbstractCollectionHelper::class);
        $managerProperty = $reflection->getProperty("manager");
        
        $managerProperty->setAccessible(true);
        $managerProperty->setValue($this->testInstance, $mockManager);
        
        $this->assertEquals(
            $return,
            $this->testInstance->arrayToCollection($source, $collectionType),
            sprintf(
                "The instance of %s is expected to the result".
                " of the manager %s method when the method %s is called",
                AbstractCollectionHelper::class,
                "process",
                "arrayToCollection"
            )
        );
    }
    
    /**
     * Test array to collection error
     * 
     * This method test the exception throwed
     * by the abstract collection helper when
     * it's manager is not set.
     * 
     * @expectedException  \LogicException
     * @return             void
     * @codeCoverageIgnore
     */
    public function testArrayToCollectionError()
    {
        $this->testInstance->arrayToCollection(
            array(),
            CollectionInterface::class
        );
    }
    
    /**
     * Test merge
     * 
     * This method test the merging operation
     * support of the abstract collection
     * helper.
     * 
     * @return void
     */
    public function testMerge()
    {
        $source = array("first", "second");
        $collectionType = ValueCollection::class;
        $return = openssl_random_pseudo_bytes(3);
        
        $mockManager = $this->getMockForAbstractClass(
            ArrayCasterManagerInterface::class
        );
        $mockManager->expects($this->once())
            ->method("process")
            ->with($this->equalTo($source), $this->equalTo($collectionType))
            ->will($this->returnValue($return));
            
        $reflection = new \ReflectionClass(AbstractCollectionHelper::class);
        $managerProperty = $reflection->getProperty("manager");
        
        $managerProperty->setAccessible(true);
        $managerProperty->setValue($this->testInstance, $mockManager);
        
        $collection1 = new ValueCollection();
        $collection1->add("first");
        $collection2 = new ValueCollection();
        $collection2->add("second");
        
        $this->assertSame(
            $return, 
            $this->testInstance->mergeCollections($collection1, $collection2),
            sprintf(
                "The instance of %s is expected to return the result of the".
                " %s method of the %s instance",
                AbstractCollectionHelper::class,
                "toCollection",
                ArrayCasterManagerInterface::class
            )
        );
    }
    
    /**
     * Test sub
     * 
     * This method test the subdivision
     * support of the abstract collection
     * helper for the simple collections.
     * 
     * @return void
     */
    public function testSub()
    {
        $source = array("1", "2");
        $collectionType = ValueCollection::class;
        $return = openssl_random_pseudo_bytes(3);
        
        $mockManager = $this->getMockForAbstractClass(
            ArrayCasterManagerInterface::class
        );
        $mockManager->expects($this->once())
            ->method("process")
            ->with($this->equalTo($source), $this->equalTo($collectionType))
            ->will($this->returnValue($return));
            
        $reflection = new \ReflectionClass(AbstractCollectionHelper::class);
        $managerProperty = $reflection->getProperty("manager");
        
        $managerProperty->setAccessible(true);
        $managerProperty->setValue($this->testInstance, $mockManager);
        
        $collection = new ValueCollection();
        $collection->addAll(array("1", "2", "3", "4"));


        $this->assertSame(
            $return,
            $this->testInstance->subCollection($collection, 0, 2),
            sprintf(
                "The instance of %s is expected to return the result of the".
                " %s method of the %s instance",
                AbstractCollectionHelper::class,
                "toCollection",
                ArrayCasterManagerInterface::class
            )
        );
    }
    
    /**
     * Test sub map
     * 
     * This method test the subdivision
     * support of the abstract collection
     * helper for the mapped collections. 
     * 
     * @return void
     */
    public function testSubMap()
    {
        $source = array("1"=>"one", "2"=>"two");
        $collectionType = MapCollection::class;
        $return = openssl_random_pseudo_bytes(3);
        
        $mockManager = $this->getMockForAbstractClass(
            ArrayCasterManagerInterface::class
        );
        $mockManager->expects($this->once())
            ->method("process")
            ->with($this->equalTo($source), $this->equalTo($collectionType))
            ->will($this->returnValue($return));
            
        $reflection = new \ReflectionClass(AbstractCollectionHelper::class);
        $managerProperty = $reflection->getProperty("manager");
        
        $managerProperty->setAccessible(true);
        $managerProperty->setValue($this->testInstance, $mockManager);
        
        $collection = new MapCollection();
        $collection->setAll(
            array("1"=>"one", "2"=>"two", "3"=>"three", "4"=>"four")
        );


        $this->assertSame(
            $return,
            $this->testInstance->subMap($collection, array("1", "2")),
            sprintf(
                "The instance of %s is expected to return the result of the".
                " %s method of the %s instance",
                AbstractCollectionHelper::class,
                "toCollection",
                ArrayCasterManagerInterface::class
            )
        );
    }
    
    /**
     * Test walk
     * 
     * This method test the walk collection
     * feature of the abstract collection
     * helper class.
     * 
     * @return void
     */
    public function testWalk()
    {
        $array = array(1, 2, 3, 4, 5);
        
        $collection = new ValueCollection();
        $collection->addAll($array);
        
        $resultArray = array();
        
        $this->testInstance->walkCollection(
            $collection,
            function ($value, $index, $uargs) use (&$resultArray) {
                $unit = $uargs[0];
                if ($unit instanceof AbstractCollectionHelperTest) {
                    $unit->assertEquals(
                        $value,
                        $index + 1,
                        sprintf(
                            "The walk method of %s instance is".
                            " expected to use the content array %s",
                            AbstractCollectionHelper::class,
                            json_encode($uargs[1])
                        )
                    );
                    
                    $resultArray[] = $value;
                }
            },
            array($this, $array)
        );
        
        $this->assertEquals(
            $array,
            $resultArray,
            sprintf(
                "the walk method of the %s instance is expected to".
                " traverse the entire content %s",
                AbstractCollectionHelper::class,
                json_encode($array)
            )
        );
    }
    
}
