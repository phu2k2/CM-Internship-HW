<?php
function getDataType($item)
{
    return gettype($item);
}

function countDataType(array $items)
{
    $result = [];
    if (!empty($items)) {
        $getDataType = array_map("getDataType", $items);
        $result = array_count_values($getDataType);
    }
    return $result;
}

$result = countDataType([1, 2.0, 'Huyen ne', 'string', [1], true, null]);
print_r($result);
