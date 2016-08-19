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
 * Helper sub trait
 *
 * This trait define the logic of the Helper
 * partitioning support.
 *
 * @category Trait
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait HelperSubTrait
{
    
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
     * @throws \ParseError if the caster manager is not able to parse the
     *                     array to the first collection
     * @return CollectionInterface
     */
    public function subCollection(
        CollectionInterface $collection,
        $start = 0,
        $length = null
    ) {
        $content = $collection->toArray();
        
        $resultContent = array_slice($content, $start, $length, true);
        
        return $this->arrayToCollection($resultContent, get_class($collection));
    }
    
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
     * @throws \ParseError if the caster manager is not able to parse the
     *                     array to the first collection
     * @return CollectionInterface
     */
    public function subMap(
        CollectionInterface $collection,
        array $keys
    ) {
        $content = $collection->toArray();
        
        $resultContent = array_intersect_key($content, array_flip($keys));

        return $this->arrayToCollection($resultContent, get_class($collection));
    }
    
}
