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

/**
 * Numberized collection trait
 *
 * This trait define the base method logic
 * of a numberized collection.
 *
 * @category Trait
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait NumberizedCollectionTrait
{
    /**
     * Is empty
     * 
     * This method return the empty status of
     * the current collection
     * 
     * @return boolean
     */
    public function isEmpty()
    {
        return empty($this->content);
    }
    
    /**
     * Count
     * 
     * This method return the count of elements
     * into the current collection.
     * 
     * @return integer
     */
    public function count()
    {
        return count($this->content);
    }
}
