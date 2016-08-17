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

use CSDT\CollectionsBundle\CollectionInterfaces\MapCollectionInterface;
use CSDT\CollectionsBundle\TraitCollection\MapCollectionTrait;

// @codingStandardsIgnoreStart
/**
 * Abstract map collection
 *
 * This abstract class provide basic
 * logic for the map collections.
 *
 * @category Abstract
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class AbstractMapCollection extends AbstractCollection implements MapCollectionInterface
{
    // @codingStandardsIgnoreEnd
    use MapCollectionTrait;
}
