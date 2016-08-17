# collections



This bundle provide a set of collection class to abstract the usage of the array and provide advanced inheritance and logic.

## Structure of a collection

The collections of this bundle are created from the following architecture :
 * Interface
 * Method traits
 * Abstract class
 * Concrete class

The Interface are childs of the CollectionInterface and defined the public methods of the collections.

The method trait define the logic of the collections. They need a 'content' property to be used. So the functionnal storage property of a collection must be named 'content' and be an array.

The Abstract class is a container for the traits and define the 'content' property.

The Concrete class is usable 'as it'.

## Available collections

#### Abstract collection

method | purpose | return | trait
-------|---------|--------|-------
clear()  | clear the collection content | return an array representative of the content before clear | ClearableCollectionTrait
contain($element) | check if the collection contain a specified value | TRUE if it contain or FALSE | ContainerCollectionTrait
containAll(array $elements) | as 'contain' but for a set of value | as 'contain' method. Return TRUE if all values are contained | ContainerCollectionTrait
isEmpty() | check if the collection is empty or not | TRUE if the collection is empty or FALSE | NumberizedCollectionTrait
count() | return the count of elements into the collection | the count as integer | NumberizedCollectionTrait
toArray() | normalize the current collection to array | the representative array of the collection | ArrayContentCollectionTrait

#### Value collection

method | purpose | return | trait
-------|---------|--------|-------
clear()  | clear the collection content | return an array representative of the content before clear | ClearableCollectionTrait
contain($element) | check if the collection contain a specified value | TRUE if it contain or FALSE | ContainerCollectionTrait
containAll(array $elements) | as 'contain' but for a set of value | as 'contain' method. Return TRUE if all values are contained | ContainerCollectionTrait
isEmpty() | check if the collection is empty or not | TRUE if the collection is empty or FALSE | NumberizedCollectionTrait
count() | return the count of elements into the collection | the count as integer | NumberizedCollectionTrait
toArray() | normalize the current collection to array | the representative array of the collection | ArrayContentCollectionTrait
add($value) | add a value to the collection | return itself to allow chained call | ValueCollectionTrait
addAll(array $values) | as add, but for a set of value | as add | ValueCollectionTrait
remove($value) | remove a value from the collection | return the deleted element or NULL if not currently stored | ValueCollectionTrait
removeAll(array $value) | as remove but for a set of value | return an array containing the deleted elements. Can be empty | ValueCollectionTrait

#### Map collection

method | purpose | return | trait
-------|---------|--------|-------
clear()  | clear the collection content | return an array representative of the content before clear | ClearableCollectionTrait
contain($element) | check if the collection contain a specified value | TRUE if it contain or FALSE | ContainerCollectionTrait
containAll(array $elements) | as 'contain' but for a set of value | as 'contain' method. Return TRUE if all values are contained | ContainerCollectionTrait
isEmpty() | check if the collection is empty or not | TRUE if the collection is empty or FALSE | NumberizedCollectionTrait
count() | return the count of elements into the collection | the count as integer | NumberizedCollectionTrait
toArray() | normalize the current collection to array | the representative array of the collection | ArrayContentCollectionTrait
has() | check if the collection contain a specified key | TRUE if the key exist, or FALSE | MapCollectionTrait
get($key) | get the content of a key from the collection | the content of the key, or NULL if not currently stored | MapCollectionTrait
set($key, $value) | set the content for a given key or create it if not currently stored | the collection to allow chained call | MapCollectionTrait
setAll(array $assocArray) | as set, but for an associative array | as set | MapCollectionTrait
remove($key) | remove a key from the collection | return the content of the key before deletion, or NULL if not currently stored | MapCollectionTrait
removeAll(array $keys) | as remove but for a set of keys | return an array of values corresponding to the deleted key values | MapCollectionTrait

#### Container collection

method | purpose | return | trait
-------|---------|--------|-------
clear()  | clear the collection content | return an array representative of the content before clear | ClearableCollectionTrait
contain($element) | check if the collection contain a specified value | TRUE if it contain or FALSE | ContainerCollectionTrait
containAll(array $elements) | as 'contain' but for a set of value | as 'contain' method. Return TRUE if all values are contained | ContainerCollectionTrait
isEmpty() | check if the collection is empty or not | TRUE if the collection is empty or FALSE | NumberizedCollectionTrait
count() | return the count of elements into the collection | the count as integer | NumberizedCollectionTrait
toArray() | normalize the current collection to array | the representative array of the collection | ArrayContentCollectionTrait
has() | check if the collection contain a specified key | TRUE if the key exist, or FALSE | MapCollectionTrait
get($key) | get the content of a key from the collection | the content of the key, or NULL if not currently stored | MapCollectionTrait
set($key, $value) | set the content for a given key or create it if not currently stored | the collection to allow chained call | MapCollectionTrait
setAll(array $assocArray) | as set, but for an associative array | as set | MapCollectionTrait
remove($key) | remove a key from the collection | return the content of the key before deletion, or NULL if not currently stored | MapCollectionTrait
removeAll(array $keys) | as remove but for a set of keys | return an array of values corresponding to the deleted key values | MapCollectionTrait
getSubset($key) | create a subset of the key content | return a ContainerCollectionInterface containing the value of the key, or an empty one if the key does not exist on is not an array or a CllectionInterface | SubsetableCollectionTrait

## A note of quality check

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/5f5871aa-5969-4441-a509-5eb79afac3a4/mini.png)](https://insight.sensiolabs.com/projects/5f5871aa-5969-4441-a509-5eb79afac3a4)

:white_check_mark: phpcs tested

:white_check_mark: phpmd tested (full rules)

:white_check_mark: phpdcd tested

:white_check_mark: phpcpd tested

:white_check_mark: phpunit tested (code coverage done)

See the doc :
	* [code coverage](https://cdn.rawgit.com/cscfaToolDivision/collections/master/doc/coverage.html/index.html)
	* [code documentation](https://cdn.rawgit.com/cscfaToolDivision/collections/master/doc/phpdox/html/namespaces.xhtml)
