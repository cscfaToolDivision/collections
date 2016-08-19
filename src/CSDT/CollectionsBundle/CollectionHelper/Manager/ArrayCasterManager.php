<?php
/**
 * This file is part of the Hephaistos project management API.
 * 
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 5.6
 *
 * @category Caster
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CollectionsBundle\CollectionHelper\Manager;

// @codingStandardsIgnoreStart
use CSDT\CollectionsBundle\CollectionHelper\HelperInterface\ArrayCasterManagerInterface;
use CSDT\CollectionsBundle\Collections\ValueSet;
use CSDT\CollectionsBundle\CollectionHelper\HelperInterface\ArrayCasterInterface;
// @codingStandardsIgnoreEnd

/**
 * Array caster manager
 *
 * This class is used to process a cast from
 * array to any collection that registered a
 * caster.
 *
 * @category Caster
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class ArrayCasterManager implements ArrayCasterManagerInterface
{
    
    /**
     * Casters
     * 
     * This property store the registered casters.
     * 
     * @var ValueSet
     */
    protected $casters;

    /**
     * Construct
     * 
     * The default ArrayCasterManager
     * constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->casters = new ValueSet();
    }
    
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
    public function process(array $array, $collectionName) 
    {
        foreach ($this->casters as $caster) {
            if ($caster instanceof ArrayCasterInterface) {
                if ($caster->support($collectionName)) {
                    return $caster->toCollection($array, $collectionName);
                }
            }
        }
        
        throw new \ParseError(
            sprintf("No caster found for %s type", $collectionName)
        );
    }
    
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
    public function addCaster(ArrayCasterInterface $caster) 
    {
        $this->casters->add($caster);
        
        return $this;
    }
}
