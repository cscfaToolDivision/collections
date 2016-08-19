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
namespace CSDT\CollectionsBundle\CollectionHelper\HelperTrait;

// @codingStandardsIgnoreStart
use CSDT\CollectionsBundle\CollectionHelper\HelperInterface\ArrayCasterManagerInterface;
// @codingStandardsIgnoreEnd

/**
 * Helper cast trait
 *
 * This trait define the base logic for the
 * helper array caster manager container.
 *
 * @category Trait
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait HelperCastTrait
{
    
    /**
     * Set caster manager
     * 
     * This method store a ArrayCasterManager
     * instance to allow the processing of the
     * array.
     * 
     * @param ArrayCasterManagerInterface $manager The manager to store
     * 
     * @return CollectionHelperInterface
     */
    public function setCasterManager(ArrayCasterManagerInterface $manager)
    {
        $this->manager = $manager;
        
        return $this;
    }
}
