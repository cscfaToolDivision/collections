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

use CSDT\CollectionsBundle\AbstractCollections\AbstractCollection;
use CSDT\CollectionsBundle\CollectionInterfaces\ValueCollectionInterface;
use CSDT\CollectionsBundle\TraitCollection\ValueCollectionTrait;

// @codingStandardsIgnoreStart
/**
 * Abstract value collection
 *
 * This class define the base logic
 * of the value collection.
 *
 * @category Abstract
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
abstract class AbstractValueCollection extends AbstractCollection implements ValueCollectionInterface
{
    // @codingStandardsIgnoreEnd
    
    use ValueCollectionTrait;
}
