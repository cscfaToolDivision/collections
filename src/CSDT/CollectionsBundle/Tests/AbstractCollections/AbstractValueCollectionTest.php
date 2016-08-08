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

use CSDT\CollectionsBundle\AbstractCollections\AbstractValueCollection;

/**
 * Abstract value collection test
 *
 * This class is used to test the
 * abstract value collection class.
 *
 * @category Test
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class AbstractValueCollectionTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * Test instance
     * 
     * This property store the instance
     * to be tested.
     * 
     * @var \PHPUnit_Framework_MockObject_MockObject|AbstractValueCollection
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
        $instance = $this->getMockForAbstractClass(AbstractValueCollection::class);
        
        $this->testInstance = $instance;
    }
    
    /**
     * Test add
     * 
     * This method is used to validate the
     * adding process of the value collection
     * class.
     * 
     * @param mixed $element The element to insert
     * 
     * @return       void
     * @dataProvider elementProvider
     */
    public function testAdd($element)
    {
        $format = "The instance of %s".
            " is expected to return %s".
            " when the method %s is called";
        
        $reflector = new \ReflectionClass($this->testInstance);
        $propertyReflection = $reflector->getProperty("content");
        
        $propertyReflection->setAccessible(true);
        
        $this->assertSame(
            $this->testInstance,
            $this->testInstance->add($element),
            sprintf(
                $format,
                AbstractValueCollection::class,
                "itself",
                "add"
            )
        );
        
        $content = $propertyReflection->getValue($this->testInstance);

        $format = "The instance of %s".
                " is expected to insert the given argument".
                " into it's content when the method %s is called".
                " with the arguments [ %s ]";
        $this->assertTrue(
            in_array($element, $content),
            sprintf(
                $format,
                AbstractValueCollection::class,
                "add",
                $element
            )
        );
    }
    
    /**
     * Test remove
     * 
     * This method is used to validate the
     * removing process of the value collection
     * class.
     * 
     * @param mixed $element The element to remove
     * 
     * @return       void
     * @dataProvider elementProvider
     */
    public function testRemove($element)
    {
        $reflector = new \ReflectionClass($this->testInstance);
        $propertyReflection = $reflector->getProperty("content");
        
        $propertyReflection->setAccessible(true);
        $propertyReflection->setValue($this->testInstance, array($element));

        $format = "The instance of %s".
                " is expected to return %s".
                " when the method %s is called".
                " with the arguments [ %s ]";
        $this->assertNull(
            $this->testInstance->remove("unconsistent"),
            sprintf(
                $format,
                AbstractValueCollection::class,
                "null",
                "remove",
                "unconsistent"
            )
        );
        $this->assertEquals(
            $element,
            $this->testInstance->remove($element),
            sprintf(
                $format,
                AbstractValueCollection::class,
                $element,
                "remove",
                $element
            )
        );
        
            $content = $propertyReflection->getValue($this->testInstance);

            $format = "The instance of %s".
                " is expected to be empty after".
                " each elements removed";
            $this->assertTrue(
                empty($content),
                sprintf(
                    $format,
                    AbstractValueCollection::class
                )
            );
    }
    
    /**
     * Element provider
     * 
     * This method is used to generate the
     * data test set of the current class methods.
     * 
     * @return             array
     * @codeCoverageIgnore
     */
    public function elementProvider()
    {
        $result = array();
        foreach ($this->elementsProvider() as $value) {
            $result[] = array($value);
        }
        return $result;
    }
    
    /**
     * Elements provider
     * 
     * This method is used to generate the
     * data test set of the list methods.
     * 
     * @return array
     */
    public function elementsProvider()
    {
        $result = array();
        for ($index = 0; $index < 20; $index++) {
            $result[] = mt_rand();
            $result[] = openssl_random_pseudo_bytes(10);
        }
        return $result;
    }
    
    /**
     * Test add all
     * 
     * This method is used to validate the list
     * adding process of the value collection
     * class.
     * 
     * @return void
     */
    public function testAddAll()
    {
        $format = "The instance of %s".
            " is expected to return %s".
            " when the method %s is called";
        
        $elements = $this->elementsProvider();
        
        $reflector = new \ReflectionClass($this->testInstance);
        $propertyReflection = $reflector->getProperty("content");
        
        $propertyReflection->setAccessible(true);
        
        $this->assertSame(
            $this->testInstance,
            $this->testInstance->addAll($elements),
            sprintf(
                $format,
                AbstractValueCollection::class,
                "itself",
                "addAll"
            )
        );
        
        $content = $propertyReflection->getValue($this->testInstance);

        $format = "The instance of %s".
                " is expected to contain %s".
                " after the method %s calling";
        $this->assertEquals(
            $elements,
            $content,
            sprintf(
                $format,
                AbstractValueCollection::class,
                "the deleted elements list",
                "removeAll"
            )
        );
    }
    
    /**
     * Test remove
     * 
     * This method is used to validate the
     * removing process of the value collection
     * class.
     * 
     * @return void
     */
    public function testRemoveAll()
    {
        $format = "The instance of %s".
            " is expected to return %s".
            " when the method %s is called".
            " with the arguments [ %s ]";
        $elements = $this->elementsProvider();
        
        $reflector = new \ReflectionClass($this->testInstance);
        $propertyReflection = $reflector->getProperty("content");
        
        $propertyReflection->setAccessible(true);
        $propertyReflection->setValue($this->testInstance, $elements);

        $this->assertTrue(
            empty($this->testInstance->removeAll(array("unconsistent"))),
            sprintf(
                $format,
                AbstractValueCollection::class,
                "an empty array",
                "removeAll",
                "unconsistent"
            )
        );
        $this->assertEquals(
            $elements,
            $this->testInstance->removeAll($elements),
            sprintf(
                $format,
                AbstractValueCollection::class,
                "the list of the deleted elements",
                "removeAll",
                implode(', ', $elements)
            )
        );
        
        $content = $propertyReflection->getValue($this->testInstance);

        $format = "The instance of %s".
                " is expected to contain %s".
                " after the method %s is called".
                " with the arguments [ %s ]";
        $this->assertTrue(
            empty($content),
            sprintf(
                $format,
                AbstractValueCollection::class,
                "an empty list",
                "removeAll",
                implode(', ', $elements)
            )
        );
    }
}
