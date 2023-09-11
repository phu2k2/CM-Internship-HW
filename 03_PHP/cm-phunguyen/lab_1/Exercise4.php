<?php
$lits = array('jan', 'feb', 'march', 'april', 'may');
$delete_item = 'april';

function removeSpecificEle($arr, $del)
{
    $key = array_search($del, $arr);
    if ($key != null) {
        unset($arr[$key]);
    }
    return $arr;
}
var_dump(removeSpecificEle($lits, $delete_item));
