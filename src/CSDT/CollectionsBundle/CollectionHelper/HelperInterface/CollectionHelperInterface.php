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
namespace CSDT\CollectionsBundle\CollectionHelper\HelperInterface;

use CSDT\CollectionsBundle\CollectionInterfaces\CollectionInterface;
use CSDT\CollectionsBundle\CollectionInterfaces\MapCollectionInterface;

/**
 * Collection helper interface
 *
 * This interface define the methods
 * of the collection helper.
 *
 * @category Interface
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface CollectionHelperInterface
{
    
    /**
     * Set caster manager
     * 
     * This method store a ArrayCasterManager
     * instance to allow the processing of the
     * array.
     * 
     * @param ArrayCasterManagerInterface $manager The manager to store
     * 
     * @return CollectionHelperInterface
     */
    public function setCasterManager(ArrayCasterManagerInterface $manager);
    
    /**
     * Array to collection
     * 
     * This method inject an array into specific collection type.
     * 
     * @param array  $source          The array source to inject
     * @param string $collectionClass The collection class name
     * 
     * @return CollectionInterface
     */
    public function arrayToCollection(array $source, $collectionClass);
    
    /**
     * Merge collection
     * 
     * Return a collection of the same type as
     * $collection1 with all the content of the
     * second collection. Note a data lost is
     * possible by example if you merge a
     * ValueCollection as $collection1 and a
     * MapCollection as $collection2.
     * 
     * @param CollectionInterface $collection1 The first collection
     * @param CollectionInterface $collection2 The second collection
     * 
     * @return CollectionInterface
     */
    public function mergeCollections(
        CollectionInterface $collection1, 
        CollectionInterface $collection2
    );
    
    /**
     * Merge array
     * 
     * Return a collectino of the same type as
     * $collection with the content of the
     * array. Note a data lost is possible by
     * example if you merge a ValueCollection
     * as $collection and an associative array
     * as $array.
     * 
     * @param CollectionInterface $collection The collection
     * @param array               $array      The array to merge
     * 
     * @return CollectionInterface
     */
    public function mergeArray(
        CollectionInterface $collection,
        array $array
    );
    
    /**
     * Sub collection
     * 
     * Return a Collection that contain a part
     * of the $collection starting at an integer
     * index and for the given length. Th content
     * will be truncated if the length is superior
     * of the real collection length. Note you are
     * able to use it with a map collection.
     * 
     * @param CollectionInterface $collection The collection where find the content
     * @param number              $start      The start index
     * @param integer             $length     The length of the result collection
     *                                        content
     * 
     * @return CollectionInterface
     */
    public function subCollection(
        CollectionInterface $collection,
        $start = 0,
        $length = null
    );
    
    /**
     * Sub map
     * 
     * Return a Collection that contain a part
     * of the $collection corresponding to the
     * to the given $keys. Note you are able to
     * use it with any collection.
     * 
     * @param CollectionInterface $collection The collection where
     *                                        find the content
     * @param array               $keys       The keys to return
     * 
     * @return CollectionInterface
     */
    public function subMap(
        CollectionInterface $collection,
        array $keys
    );
    
    /**
     * Walk collection
     * 
     * Apply a closure foreach elements of a collection.
     * It send to the closure the value as first argument
     * and the index as second one.
     * 
     * @param CollectionInterface $collection The collection to walk
     * @param \Closure            $closure    The closure to apply
     * @param array               $args       [optional] The array of argument to
     *                                        send as third argument
     *                               
     * @return void
     */
    public function walkCollection(
        CollectionInterface $collection,
        \Closure $closure,
        array $args = null
    );
    
}
