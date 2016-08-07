<?php
/**
 * This file is part of the Hephaistos project management API.
 * 
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 5.6
 *
 * @category Interface
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CollectionsBundle\CollectionInterfaces;

/**
 * Collection interface
 *
 * This interface define the base methods of the collections.
 *
 * @category Interface
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface CollectionInterface extends \IteratorAggregate
{
    /**
     * Clear
     * 
     * This method is used to clear the
     * collection content. It return the
     * result of the toArray method.
     * 
     * @return array
     */
    public function clear();
    
    /**
     * Contain
     * 
     * This method is used to check if the
     * current collection contain a specified
     * value. It return true if the collection
     * contain the element.
     * 
     * @param mixed $element The element needed
     * 
     * @return boolean
     */
    public function contain($element);
    
    /**
     * Contain all
     * 
     * This method is used to check if the
     * current collection contain a specific
     * list of values. It return true if the
     * collection contain all of the list
     * values.
     * 
     * @param array $elements The list of needed elements
     * 
     * @return boolean
     */
    public function containAll(array $elements);
    
    /**
     * Is empty
     * 
     * This method return true if the collection
     * does not contain any value. False otherwise.
     * 
     * @return boolean
     */
    public function isEmpty();
    
    /**
     * Count
     * 
     * This method return the count of
     * the collection elements as integer.
     * 
     * @return integer
     */
    public function count();
    
    /**
     * To array
     * 
     * This method return the array interpretation
     * of the current collection.
     * 
     * @return array
     */
    public function toArray();
}
