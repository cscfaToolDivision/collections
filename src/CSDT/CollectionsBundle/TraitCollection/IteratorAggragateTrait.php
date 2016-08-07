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
namespace CSDT\CollectionsBundle\TraitCollection;

/**
 * Iterator aggregate trait
 *
 * This trait define the base iterator
 * aggregate logic.
 *
 * @category Trait
 * @package  Hephaistos
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait IteratorAggragateTrait
{
    /**
     * Get iterator
     * 
     * This method return the content of the
     * collection into an array iterator
     * instance.
     * 
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->content);
    }
}
