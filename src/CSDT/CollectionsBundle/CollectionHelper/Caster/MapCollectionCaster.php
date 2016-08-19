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
namespace CSDT\CollectionsBundle\CollectionHelper\Caster;

use CSDT\CollectionsBundle\CollectionHelper\HelperInterface\ArrayCasterInterface;
use CSDT\CollectionsBundle\CollectionInterfaces\MapCollectionInterface;

/**
 * Map collection caster
 *
 * This class is used to cast array to MapCollection type.
 *
 * @category Caster
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class MapCollectionCaster implements ArrayCasterInterface
{

    /**
     * To collection
     *
     * This method cast an array into
     * a specific collection.
     *
     * @param array  $array The array to cast
     * @param string $class The class to render
     *
     * @throws LogicException if the given class is not supported
     * @return CollectionInterface
     */
    public function toCollection(array $array, $class)
    {
        $reflection = new \ReflectionClass($class);
        $collection = $reflection->newInstanceWithoutConstructor();
       
        if ($collection instanceof MapCollectionInterface) {
            $collection->setAll($array);
            return $collection;
        }
        
        throw new \LogicException(
            sprintf("The MapCollectionCaster does not support type %s", $class)
        );
    }

    /**
     * Support
     *
     * Return true if the array caster
     * support the given collection class.
     *
     * @param string $class The collection class name
     *
     * @return boolean
     */
    public function support($class)
    {
        return in_array(
            MapCollectionInterface::class,
            class_implements($class)
        );
    }
}
