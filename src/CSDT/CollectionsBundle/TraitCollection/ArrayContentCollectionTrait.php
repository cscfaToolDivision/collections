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
 * Array content collection trait
 *
 * This trait define the logic for the
 * array content collections.
 *
 * @category Trait
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait ArrayContentCollectionTrait
{
    /**
     * To array
     * 
     * This method return the array interpretation
     * of the current collection.
     * 
     * @return array
     */
    public function toArray()
    {
        return $this->content;
    }
}
