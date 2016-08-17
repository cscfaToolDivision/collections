<?php
/**
 * This file is part of the Hephaistos project management API.
 * 
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 5.6
 *
 * @category Trait
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CollectionsBundle\TraitCollection;

use CSDT\CollectionsBundle\CollectionInterfaces\ContainerCollectionInterface;
use CSDT\CollectionsBundle\CollectionInterfaces\CollectionInterface;

/**
 * Subsetable collection trait
 *
 * This trait define the logic of a
 * subsetable collection:
 *
 * @category Trait
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait SubsetableCollectionTrait
{
    
    /**
     * Get subset
     * 
     * This method return a new ContainerCollectionInterface
     * containing the value of the given key, parsed
     * as ContainerCollectionInterface.
     * 
     * @param mixed $key The key whence create the subset
     * 
     * @throws \LogicException If the method is called with an instance that
     *                         don't match ContainerCollectionInterface
     * @return ContainerCollectionInterface
     */
    public function getSubset($key)
    {
        $target = $this->newInstance();
        
        if (!($target instanceof ContainerCollectionInterface)) {
            throw new \LogicException(
                "The SubsetableCollectionTrait must be used".
                " into ContainerCollectionInterface childs"
            );
        }
        
        if ($this->has($key)) {
            $source = $this->get($key);
            
            if (is_array($source)) {
                $this->fromArray($source, $target);
            } else if ($source instanceof CollectionInterface) {
                $this->fromArray($source->toArray(), $target);
            }
        }
        
        return $target;
    }
    
    /**
     * New instance
     * 
     * This method is used to create dynamically
     * an instance of ContainerCollectionInterface.
     * 
     * @return                     ContainerCollectionInterface
     * @codingStandardsIgnoreStart
     */
    private function newInstance()
    {
        // @codingStandardsIgnoreEnd
        
        $reflection = new \ReflectionClass($this);
        return $reflection->newInstanceWithoutConstructor();
    }
    
    /**
     * From array
     * 
     * This method hydrate a ContainerCollectionInterface
     * from the values and key contained into an array
     * 
     * @param array                        $source The source array
     * @param ContainerCollectionInterface $target The target collection
     * 
     * @return void
     */
    protected function fromArray(
        array $source,
        ContainerCollectionInterface $target
    ) {
        foreach ($source as $key => $value) {
            $target->set($key, $value);
        }
    }
}
