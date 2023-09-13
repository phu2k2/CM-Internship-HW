<?php

function countDataType(array $items)
{
    // Get the count of each data type in the array
    $count = array_count_values(array_map('gettype', $items));
    
    // Define the allowed data types
    $allowedTypes = ["string", "integer", "double", "boolean", "array", "NULL"];

    // Filter the count array to only include allowed data types
    $result = array_intersect_key($count, array_flip($allowedTypes));

    return $result;
}

// Input
$items = [1, 2.0, "string", [1], true, null,[1,2]];

// Get the count of data types
$result = countDataType($items);

// Output
print_r($result);
