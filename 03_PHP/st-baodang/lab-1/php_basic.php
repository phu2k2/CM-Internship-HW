<?php

// PHP using recursive function
function recursive() {

    static $num = 0;

    $num += 1;
    if ($num < 10) {
        echo "$num ";
        recursive();
    }
    $num -= 1;

}

// ====================================================================
// PHP function (Fix the Spacing)
function correctSpacing($sentence) {
    $result = preg_replace('/\s+/', ' ', $sentence);
    return trim($result);
}


// ====================================================================
// PHP Array Return the First Element in an Array
function getFirstValue($array) {
    $new_array = array_reverse($array);
    return array_pop($new_array);
}

function getFirstValue_2($array) {
    return array_shift($array);
}

echo getFirstValue([1, 2, 3]) . "\n";
echo getFirstValue([80, 5, 100]) . "\n";
echo getFirstValue([-500, 0, 50]) . "\n";

echo getFirstValue_2([1, 2, 3]) . "\n";
echo getFirstValue_2([80, 5, 100]) . "\n";
echo getFirstValue_2([-500, 0, 50]) . "\n";



// ====================================================================
// PHP Array (Remove specific element by value from array)
$list = array('jan', 'feb', 'march', 'april', 'may');
$delete_item = 'april';

function removeValue($array, ...$value) {
    $result = array_diff($array, $value);
    return $result;
}

function removeValue_2($array, $value) {
    if (($key = array_search($value, $array)) !== false) unset($array[$key]);
    return $array;
}

function removeValue_3($array, $value) {
    foreach($array as $key => $tag_value) {
        if ($tag_value === $value) {
            unset($array[$key]);
        }
    }
    return $array;
}

// ====================================================================
// PHP Array (Repeating Letter)
function doubleChar($str) {
    $result = "";
    for ($i = 0; $i < strlen($str); $i++) {
        $result .= $str[$i] . $str[$i];
    }
    return $result;
}

// ====================================================================
// PHP Array (check if an Array is a subnet of another Array)
$array = array('jan', 'feb', 'march', 'april', 'may');
$another_array = array('jan', 'may');

function isSubArray($array, $sub_array) {
    if (count(array_intersect($array, $sub_array)) == count($sub_array)) return true;
    return false;
}

function isSubArray_2($array, $sub_array) {
    return empty(array_diff($sub_array, $array));
}

// ====================================================================
// PHP IF ELSE, FOR DO WHILE, SWITCH
// Sử dụng FOR and DO WHILE in ra giá trị chẵn của 1 khoảng giá trị min max cho trước
function evenValue($min, $max) {
    for ($i = $min; $i <= $max; $i++) {
        if ($i % 2 == 0) {
            echo "$i ";
        }
    }
}

function evenValue_2($min, $max) {
    
    do {
        if($min % 2 == 0) echo "$min ";
        $min++;
    } while ($min <= $max);
}

// Sử dụng SWITCH CASE để in ra số ngày trong tháng
function dayOfMonth($month, $year) {
    $isLeapYear = ($year % 4 === 0 && $year % 100 !== 0) || ($year % 400 === 0);
    switch ($month) {
        case 2:
            if($isLeapYear) return 29;
            return 28;
        case 4:
        case 6:
        case 9:
        case 11:
            return 30;
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            return 31;
        default:
            return -1;
    }
}

echo dayOfMonth(12, 2012);

// Sử dụng IF ELSE để check 1 biến khác null
function checkNull($variable) {
    if (is_null($variable)) echo "Bien truyen vao null";
    else echo "Bien truyen vao khac null";
}
// ====================================================================
// Write a function to calculate the Electricity
/**
 * For first 50	kWh 		- 1728 đồng/kWh
 * For next 50	kWh 		- 1786 đồng/kWh
 * For next 100	kWh		    - 2074 đồng/kWh
 * For next 100	kWh		    - 2612 đồng/kWh
 * For next 100	kWh		    - 2919 đồng/kWh
 * For until about next 	- 3015 đồng/kWh
 * $bill = $units * cost (for first 50kWh = 50 * 1728)
 */
function calculate_bill(int $unit) {
    $result = 0;
    switch (true) {
        case $unit > 400:
            $result += ($unit - 400) * 3015;
            $unit = 400;
        case $unit > 300:
            $result += ($unit - 300) * 2919;
            $unit = 300;
        case $unit > 200:
            $result += ($unit - 200) * 2612;
            $unit = 200;
        case $unit > 100:
            $result += ($unit - 100) * 2074;
            $unit = 100;
        case $unit > 50:
            $result += ($unit - 50) * 1786;
            $unit = 50;
        default:
            $result += ($unit) * 1728;
            
    }

    return $result;
}
