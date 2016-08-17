<?php
/**
 * This file is part of the Hephaistos project management API.
 * 
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 5.6
 *
 * @category Abstract
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CollectionsBundle\AbstractCollections;

use CSDT\CollectionsBundle\AbstractCollections\AbstractMapCollection;
use CSDT\CollectionsBundle\CollectionInterfaces\ContainerCollectionInterface;
use CSDT\CollectionsBundle\TraitCollection\SubsetableCollectionTrait;

// @codingStandardsIgnoreStart
/**
 * Abstract container collection
 *
 * This abstract class provide basic
 * logic for the container collections.
 *
 * @category Abstract
 * @package Hephaistos
 * @author matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license MIT <https://opensource.org/licenses/MIT>
 * @link http://cscfa.fr
 */
abstract class AbstractContainerCollection extends AbstractMapCollection implements ContainerCollectionInterface
{
    // @codingStandardsIgnoreEnd
    
    use SubsetableCollectionTrait;
}
