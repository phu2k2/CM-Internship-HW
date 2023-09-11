<?php
function getFirstValue($array) {
    if(count($array) === 0) echo 'Array is empty';
    else echo $array[0];
}
getFirstValue([]);
echo "\n";
getFirstValue([1, 2, 3]);