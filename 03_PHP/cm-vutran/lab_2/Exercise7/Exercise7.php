<?php
$array = ["mouse", "cat", "dog", "fish"];
$filterLength = 3;
$array = array_filter($array, function ($item) use ($filterLength) {
    return strlen($item) <= $filterLength;
});

print_r($array);
