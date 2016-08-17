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
 * Map collection trait
 *
 * This trait define the method logic
 * for the methods of the map collection.
 *
 * @category Trait
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait MapCollectionTrait
{
    /**
     * Has
     * 
     * This method check if the given key exist
     * in the current content set. It return
     * true if the key is find. False otherwise.
     * 
     * @param mixed $key The key to search
     * 
     * @return boolean
     */
    public function has($key)
    {
        return array_key_exists($key, $this->content);
    }

    /**
     * Get
     * 
     * This method is used to get the content of
     * the specified index if exist. It return
     * null if the index does not contain anything
     * or if it does not exist.
     * 
     * @param mixed $key The index whence get the content
     * 
     * @return mixed|null
     */
    public function get($key)
    {
        if ($this->has($key)) {
            return $this->content[$key];
        }
        
        return null;
    }

    /**
     * Set
     *
     * This method set a specific key with a value.
     *
     * @param mixed $key   The key where insert the value
     * @param mixed $value The value to insert
     *
     * @return MapCollectionInterface
     */
    public function set($key, $value)
    {
        $this->content[$key] = $value;
        return $this;
    }
    
    /**
     * Set all
     *
     * Setting a list of key value into an
     * associative array.
     *
     * @param array $assocArray The associative array to insert
     *
     * @return MapCollectionInterface
     */
    public function setAll(array $assocArray)
    {
        foreach ($assocArray as $key => $value) {
            $this->set($key, $value);
        }
        
        return $this;
    }

    /**
     * Remove
     *
     * Remove a specified key. It return the
     * value contained into the key.
     *
     * @param mixed $key The key to remove
     *
     * @return mixed
     */
    public function remove($key)
    {
        $returnValue = $this->get($key);
        $this->content = array_diff_key($this->content, array_flip(array($key)));
        return $returnValue;
    }

    /**
     * Remove all
     *
     * This method allow to remove a set of key. It return
     * an array of removed value.
     *
     * @param array $keys The set of key to remove
     *
     * @return array
     */
    public function removeAll(array $keys)
    {
        $comparison = array_flip($keys);
        
        $returnValues = array_intersect_key($this->content, $comparison);
        $this->content = array_diff_key($this->content, $comparison);
        return $returnValues;
    }
}
