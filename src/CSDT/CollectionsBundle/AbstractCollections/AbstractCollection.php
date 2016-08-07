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

use CSDT\CollectionsBundle\CollectionInterfaces\CollectionInterface;
use CSDT\CollectionsBundle\TraitCollection\ClearableCollectionTrait;
use CSDT\CollectionsBundle\TraitCollection\IteratorAggragateTrait;
use CSDT\CollectionsBundle\TraitCollection\NumberizedCollectionTrait;
use CSDT\CollectionsBundle\TraitCollection\ContainerCollectionTrait;
use CSDT\CollectionsBundle\TraitCollection\ArrayContentCollectionTrait;

/**
 * Abstract collection
 *
 * This abstract class provide base logic
 * for the collections.
 *
 * @category Abstract
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
abstract class AbstractCollection implements CollectionInterface
{
    
    use IteratorAggragateTrait,
        NumberizedCollectionTrait,
        ClearableCollectionTrait,
        ContainerCollectionTrait,
        ArrayContentCollectionTrait;
    
    /**
     * Content
     * 
     * This property store the collection
     * content as array;
     * 
     * @var array
     */
    protected $content = array();
    
}
