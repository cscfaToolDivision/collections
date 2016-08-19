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
 * Helper walker trait
 *
 * This trait define the walking collection
 * support of the colelction helper.
 *
 * @category Trait
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait HelperWalkerTrait
{
    
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
    ) {
        $content = $collection->toArray();
        
        array_walk($content, $closure, $args);
    }
    
}
