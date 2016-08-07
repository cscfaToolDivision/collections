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
 * Container collection trait
 *
 * This trait define the base logic of
 * the container collections.
 *
 * @category Trait
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait ContainerCollectionTrait
{
    /**
     * Contain
     * 
     * This method is used to check if the
     * current collection contain a specified
     * value. It return true if the collection
     * contain the element.
     * 
     * @param mixed $element The element needed
     * 
     * @return boolean
     */
    public function contain($element) 
    {
        return array_search($element, $this->content) !== false;
    }

    /**
     * Contain all
     *
     * This method is used to check if the
     * current collection contain a specific
     * list of values. It return true if the
     * collection contain all of the list
     * values.
     *
     * @param array $elements The list of needed elements
     *
     * @return boolean
     */
    public function containAll(array $elements) 
    {
        foreach ($elements as $element) {
            if (!$this->contain($element)) {
                return false;
            }
        }
        
        return true;
    }
}
