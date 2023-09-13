<?php
function getTypeOfValue($value)
{
    return gettype($value);
}
function countDataTypes($items)
{
    $countArray = array_map('getTypeOfValue', $items);
    return empty(array_count_values($countArray)) ? [] : array_count_values($countArray);
}

$items = [1, 2, 2.0, "string", [1], 2, true, null];
print_r(countDataTypes($items));
