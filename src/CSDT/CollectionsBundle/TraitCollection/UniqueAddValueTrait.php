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
 * Unique add value trait
 *
 * This trait define the logic of a
 * unique value insertion set.
 *
 * @category Trait
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait UniqueAddValueTrait
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
    public function add($value)
    {
        if (!$this->contain($value)) {
            parent::add($value);
        }
        
        return $this;
    }
}
