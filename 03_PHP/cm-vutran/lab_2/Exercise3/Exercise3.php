<?php
function getTypeOfValue($value)
{
    return gettype($value);
}

function arrayCountValues($array)
{
    $arrayTemp = array();
    foreach ($array as $value) {
        $arrayTemp[$value] = isset($arrayTemp[$value]) ? $arrayTemp[$value]+1 : 1;
    }
    return $arrayTemp;
}

function countDataTypes($items)
{
    $countArray = array_map('getTypeOfValue', $items);
    return arrayCountValues($countArray);
}

$items = [1, 2, 2.0, "string", [1], 2, true, null];
print_r(countDataTypes($items));
