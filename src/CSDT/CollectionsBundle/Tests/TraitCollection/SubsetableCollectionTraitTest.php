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
namespace CSDT\CollectionsBundle\TraitCollection;

/**
 * Subsetable collection trait test
 *
 * This class is used to test the subsetable
 * collection trait.
 *
 * @category Test
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class SubsetableCollectionTraitTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * Test instance
     * 
     * This property store the instance
     * to be tested.
     * 
     * @var \PHPUnit_Framework_MockObject_MockObject|SubsetableCollectionTrait
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
        $this->testInstance = $this->getMockForTrait(
            SubsetableCollectionTrait::class
        );
    }
    
    /**
     * Test exception
     * 
     * This method test the get subset support
     * of the Container collections with a no
     * Collection child instance.
     * 
     * @return void
     */
    public function testException()
    {
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage(
            "The SubsetableCollectionTrait must be used".
            " into ContainerCollectionInterface childs"
        );
        
        $this->testInstance->getSubset("anything");
    }
    
}
