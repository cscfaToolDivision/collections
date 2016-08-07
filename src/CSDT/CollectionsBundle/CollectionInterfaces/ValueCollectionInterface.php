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

use CSDT\CollectionsBundle\CollectionInterfaces\CollectionInterface;

/**
 * Value collection interface
 *
 * This interface define the base methods of a simple value
 * collection.
 *
 * @category Interface
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface ValueCollectionInterface extends CollectionInterface
{
    /**
     * Add
     * 
     * This method is used to add a new
     * element to the collection.
     * 
     * @param mixed $value The value to add
     * 
     * @return ValueCollectionInterface
     */
    public function add($value);
    
    /**
     * Add all
     * 
     * This method is used to add a list
     * of new element to the collection.
     * 
     * @param array $values The value list to add
     * 
     * @return ValueCollectionInterface
     */
    public function addAll(array $values);
    
    /**
     * Remove
     * 
     * This method is used to remove an
     * element from the collection. It
     * return the removed element or null
     * if no one is removed.
     * 
     * @param mixed $value The value to remove
     * 
     * @return mixed|null
     */
    public function remove($value);

    /**
     * Remove all
     *
     * This method is used to remove a list
     * of element from the collection. It
     * return a list of removed elements.
     *
     * @param array $values The list of value to remove
     *
     * @return array
     */
    public function removeAll(array $values);
}
