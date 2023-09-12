<?php
$lits = array('jan', 'feb', 'march', 'april', 'april', 'may');
$delete_item = 'april';

function removeSpecificElement($arr, $del)
{
    $newArr = array_unique($arr);
    $key = array_search($del, $newArr);
    if ($key != null) {
        unset($newArr[$key]);
    }
    return $newArr;
}
var_dump(removeSpecificElement($lits, $delete_item));
