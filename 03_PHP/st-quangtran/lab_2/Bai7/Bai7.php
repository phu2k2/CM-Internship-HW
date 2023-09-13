<?php 
$array = ["mouse", "cat", "dog", "elephant", "lion"];
$filterLength = 6;
$filteredArray = array_filter($array, function($item) use ($filterLength) {
    return strlen($item) <= $filterLength;
});
print_r($filteredArray);
?>
