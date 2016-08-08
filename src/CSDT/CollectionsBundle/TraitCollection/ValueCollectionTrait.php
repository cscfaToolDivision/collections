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
 * Value collection trait
 *
 * This trait define the base logic
 * of the value collection.
 *
 * @category Trait
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait ValueCollectionTrait
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
        $this->content[] = $value;
        return $this;
    }

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
    public function remove($value)
    {
        if ($this->contain($value)) {
            unset($this->content[array_search($value, $this->content)]);
        } else {
            $value = null;
        }
        
        return $value;
    }

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
    public function addAll(array $values)
    {
        foreach ($values as $value) {
            $this->add($value);
        }
        return $this;
    }

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
    public function removeAll(array $values)
    {
        $removedValues = array();
        foreach ($values as $value) {
            if ($this->remove($value) !== null) {
                $removedValues[] = $value;
            }
        }
        return $removedValues;
    }
}
