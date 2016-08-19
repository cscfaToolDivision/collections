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
namespace CSDT\CollectionsBundle\CollectionHelper\HelperTrait;

use CSDT\CollectionsBundle\CollectionInterfaces\CollectionInterface;

/**
 * Helper marge trait
 *
 * This trait define the logic for the
 * helper merging support.
 *
 * @category Trait
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait HelperMergeTrait
{
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
     * @throws \ParseError if the caster manager is not able to parse the
     *                     array to the first collection
     * @return CollectionInterface
     */
    public function mergeCollections(
        CollectionInterface $collection1, 
        CollectionInterface $collection2
    ) {
        return $this->mergeArray($collection1, $collection2->toArray());
    }
    
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
     * @throws \ParseError if the caster manager is not able to parse the
     *                     array to the first collection
     * @return CollectionInterface
     */
    public function mergeArray(
        CollectionInterface $collection,
        array $array
    ) {
        $collectionContent = $collection->toArray();
        
        $content = array_merge($collectionContent, $array);
        
        return $this->arrayToCollection($content, get_class($collection));
    }
}
