<?php 
function countDataType(array $items) {
    if(empty($items)) {
        return "[]";
    }
    $init = array('string' => 0, 'integer' => 0, 'double' => 0, 'boolean' => 0, 'array' => 0, 'NULL' => 0);
    $dataTypeCounts = array_reduce($items, function($carry, $item) {
        $dataType = gettype($item);
        if(!isset($carry[$dataType])) {
            $carry[$dataType] = 1;
        } else {
            $carry[$dataType]++;
        }
        return $carry;
    }, $init);
    return $dataTypeCounts;
}   

$items = [1, "hello", true, 2, "world", false];
$result = countDataType($items);
print_r($result) ;
?>
