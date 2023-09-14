<?php 
function countDataType(array $items) {
    if(!$items) {
        return $items;
    }
    $init = array('string' => 0, 'integer' => 0, 'double' => 0, 'boolean' => 0, 'array' => 0, 'NULL' => 0);
    $dataTypeCounts = array_reduce($items, function($carry, $item) {
        $dataType = gettype($item);
        $carry[$dataType] = isset($carry[$dataType]) ? $carry[$dataType] + 1 : 1;
        return $carry;
    }, $init);
    return $dataTypeCounts;
}

$items = [1, "hello", true, 2, "world", false];
$items = [];
$result = countDataType($items);
print_r($result) ;
?>
