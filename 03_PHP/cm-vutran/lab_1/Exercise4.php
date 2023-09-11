<?php
//solution 1
function removeSpecific ($array, $deleteItem) {
    while($indexDelete = array_search($deleteItem, $array)) {
        unset($array[$indexDelete]);
    }
    print_r($array);
}
removeSpecific(['jan', 'feb', 'march', 'april', 'april', 'may'], 'april');
//solution 2
function removeSpecific2 ($array, $deleteItem) {
    print_r(array_diff($array,[$deleteItem]));
}
removeSpecific2(['jan', 'feb', 'march', 'march', 'april', 'may'], 'march');
