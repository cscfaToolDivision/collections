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
 * Array caster manager
 *
 * This interface define the method
 * of the array caster manager.
 *
 * @category Interface
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface ArrayCasterManagerInterface
{
    /**
     * Add caster
     * 
     * This method allow to store an ArrayCaster
     * instance into the manager.
     * 
     * @param ArrayCasterInterface $caster The ArrayCaster to store
     * 
     * @return ArrayCasterManagerInterface
     */
    public function addCaster(ArrayCasterInterface $caster);
    
    /**
     * Process
     * 
     * This method search the caster able to
     * process the given array. It thrown an
     * exception if no one is stored.
     * 
     * @param array  $array          The array to process
     * @param string $collectionName The collection class result
     * 
     * @throws \ParseError if no one caster is able to parse the array
     * @return CollectionInterface
     */
    public function process(array $array, $collectionName);
}
