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
 * Helper array caster trait
 *
 * This trait define the logic for the
 * helper array casting process.
 *
 * @category Trait
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait HelperArrayCasterTrait
{
    /**
     * Array to collection
     * 
     * This method inject an array into specific collection type.
     * 
     * @param array  $source          The array source to inject
     * @param string $collectionClass The collection class name
     * 
     * @throws \ParseError if the array cannot be cast
     * @return CollectionInterface
     */
    public function arrayToCollection(array $source, $collectionClass)
    {
        $manager = $this->manager;
        if ($manager instanceof ArrayCasterManagerInterface) {
            return $manager->process($source, $collectionClass);
        }
        
        throw new \LogicException(
            "The manager must be set to cast array in collection"
        );
    }
}
