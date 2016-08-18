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

use CSDT\CollectionsBundle\AbstractCollections\AbstractValueSet;

/**
 * Abstract value set test
 *
 * This class provide test methods for an
 * instance of AbstractValueSet class.
 *
 * @category Test
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class AbstractValueSetTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * Test instance
     * 
     * This property store the instance
     * to be tested.
     * 
     * @var \PHPUnit_Framework_MockObject_MockObject|AbstractValueSet
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
            AbstractValueSet::class
        );
    }
    
    /**
     * Test add
     * 
     * This method is used to validate the
     * adding process of the value set
     * class.
     * 
     * @return void
     */
    public function testAdd()
    {
        $reflection = new \ReflectionClass($this->testInstance);
        $property = $reflection->getProperty("content");
        $property->setAccessible(true);
        
        $this->assertSame(
            $this->testInstance,
            $this->testInstance->add("test"),
            sprintf(
                "The instance of %s is expected to return %s".
                " when the method %s is called",
                AbstractValueSet::class,
                "itself",
                "add"
            )
        );

        $this->testInstance->add("test");
        
        $content = $property->getValue($this->testInstance);
        
        $this->assertEquals(
            1,
            count($content),
            sprintf(
                "The instance of %s is expected to".
                " desallow the insertion of doubled value",
                AbstractValueSet::class
            )
        );
    }
    
}
