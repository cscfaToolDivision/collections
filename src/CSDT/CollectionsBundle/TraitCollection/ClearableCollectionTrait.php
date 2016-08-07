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
 * Clearable collection trait
 *
 * This trait define the base logic of a
 * clearable collection.
 *
 * @category Trait
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait ClearableCollectionTrait
{
    /**
     * Clear
     * 
     * This method is used to clear the
     * collection content. It return the
     * result of the toArray method.
     * 
     * @return array
     */
    public function clear()
    {
        $temporaryCollection = $this->content;
        $this->content = array();
        
        return $temporaryCollection;
    }
}
