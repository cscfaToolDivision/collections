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

#### Value set

method | purpose | return | trait
-------|---------|--------|-------
clear()  | clear the collection content | return an array representative of the content before clear | ClearableCollectionTrait
contain($element) | check if the collection contain a specified value | TRUE if it contain or FALSE | ContainerCollectionTrait
containAll(array $elements) | as 'contain' but for a set of value | as 'contain' method. Return TRUE if all values are contained | ContainerCollectionTrait
isEmpty() | check if the collection is empty or not | TRUE if the collection is empty or FALSE | NumberizedCollectionTrait
count() | return the count of elements into the collection | the count as integer | NumberizedCollectionTrait
toArray() | normalize the current collection to array | the representative array of the collection | ArrayContentCollectionTrait
add($value) | add a value to the collection. It will not be inserted if it not unique in the current content without throwing any exception | return itself to allow chained call | ValueCollectionTrait
addAll(array $values) | as add, but for a set of value | as add | ValueCollectionTrait
remove($value) | remove a value from the collection | return the deleted element or NULL if not currently stored | ValueCollectionTrait
removeAll(array $value) | as remove but for a set of value | return an array containing the deleted elements. Can be empty | ValueCollectionTrait

## The collection helper

The collection helper take care of the advanced behaviour of the collection logic. It allow to merge, cut, traverse and create collections from array. This helper is a service and can be getted by it's id 'collection.helper.std'.

You will be able to use the following methods :

method | purpose | arguments | return 
-------|---------|-----------|--------
arrayToCollection | create a collection from an array | source array, collection classname to create | an instance of the needed collection
mergeCollections | merge to collections instance | first collection, second collection | a collection of the first collection given type with the content of the two collections
mergeArray | merge a collection and an array | collection, array | a collection of the given collection type with the content of the collection and the array
subCollection | create a new collection from a collection with a subset of the content | collection, start index, length | return a collection of the given collection type with the content from the started integer index with the given length
subMap | create a new collection from a collection with the intersection of the given keys as content | collection, array of needed keys | return a collection of the given collection type with the keys that exists into the given collection and the key array
walkCollection | execute a given function for all of the elements of the given collection. The given function will receive the value, the key and the given argument array in this order as argument | collection, function, argument array | nothing

To work fine, the collection helper need a array caster that support the given collection. If you create your own collection and want to use it into the helper, you must create an array caster for your collection. Note the existing casters support the MapCollectionInterface childs and ValueCollectionInterfaceChilds.

#### Create an array caster

The array caster need to implement the ArrayCasterInterface. It define two methods :
 * support($class) : check if the given class name is supported by the array caster. It must return true or false.
 * toCollection(array $array, $class) : create a collection of the given class with the content of the array as content.

After your caster created, you must register it at a service, with the 'collection.helper.caster' tag. The bundle will automatically register it into the array caster manager of the helpers.

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
