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
namespace CSDT\CollectionsBundle\CollectionInterfaces;

use CSDT\CollectionsBundle\CollectionInterfaces\MapCollectionInterface;

/**
 * Container collection interface
 *
 * This interface define the base methods
 * for the container collection
 *
 * @category Interface
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface ContainerCollectionInterface extends MapCollectionInterface
{
    /**
     * Get subset
     * 
     * This method return a new ContainerCollectionInterface
     * containing the value of the given key, parsed
     * as ContainerCollectionInterface.
     * 
     * @param mixed $key The key whence create the subset
     * 
     * @return ContainerCollectionInterface
     */
    public function getSubset($key);
}
