<?php

//Method 1: Using array_diff()
$lits = ["jan", "feb", "march", "april", "may"];
$delete_item = "april";
$lits = array_diff($lits, [$delete_item]);
print_r($lits);

//Method 2: Using array_search()
$valueToRemove = "march";
while ($key = array_search($valueToRemove, $list)) {
    unset($list[$key]);
}
print_r($lits);

//Method 3 :
foreach ($lits as $key => $value) {
    if ($value == $delete_item) {
        unset($lits[$key]);
    }
}
