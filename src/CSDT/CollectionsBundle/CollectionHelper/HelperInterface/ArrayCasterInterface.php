<?php
/**
 * This file is part of the Hephaistos project management API.
 * 
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 5.6
 *
 * @category Interface
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CollectionsBundle\CollectionHelper\HelperInterface;

use CSDT\CollectionsBundle\CollectionInterfaces\CollectionInterface;

/**
 * Array caster interface
 *
 * This interface define the methods of a array
 * to colection caster class.
 *
 * @category Interface
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface ArrayCasterInterface
{
    /**
     * To collection
     * 
     * This method cast an array into
     * a specific collection.
     * 
     * @param array  $array The array to cast
     * @param string $class The class to render
     * 
     * @return CollectionInterface
     */
    public function toCollection(array $array, $class);
    
    /**
     * Support
     * 
     * Return true if the array caster
     * support the given collection class.
     * 
     * @param string $class The collection class name
     * 
     * @return boolean
     */
    public function support($class);
}
