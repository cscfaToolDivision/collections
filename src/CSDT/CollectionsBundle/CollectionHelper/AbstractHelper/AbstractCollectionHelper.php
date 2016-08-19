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
namespace CSDT\CollectionsBundle\CollectionHelper\AbstractHelper;

// @codingStandardsIgnoreStart
use CSDT\CollectionsBundle\CollectionHelper\HelperInterface\CollectionHelperInterface;
use CSDT\CollectionsBundle\CollectionHelper\HelperTrait\HelperArrayCasterTrait;
use CSDT\CollectionsBundle\CollectionHelper\HelperTrait\HelperCastTrait;
use CSDT\CollectionsBundle\CollectionHelper\HelperTrait\HelperMergeTrait;
use CSDT\CollectionsBundle\CollectionHelper\HelperTrait\HelperWalkerTrait;
use CSDT\CollectionsBundle\CollectionHelper\HelperTrait\HelperSubTrait;
// @codingStandardsIgnoreEnd

/**
 * Abstract collection helper
 *
 * This class provide base logic for
 * the collection helper.
 *
 * @category Abstract
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
abstract class AbstractCollectionHelper implements CollectionHelperInterface
{
    use HelperArrayCasterTrait,
        HelperCastTrait,
        HelperMergeTrait,
        HelperWalkerTrait,
        HelperSubTrait;
    
    protected $manager;
}
