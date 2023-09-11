<?php
//Cau 1
function recursive($number) {    
    if($number<=5){    
     echo "$number\n";    
     recursive($number+1);    
    }  
}
recursive(1);    

//Cau 2
function correctSpacing($sentence) {
    $words = explode(' ', $sentence);
    $cleaned_words = array_filter($words, 'strlen');
    $output = implode(' ', $cleaned_words);
    return $output;
}

echo correctSpacing("The film    starts  at midnight.   ");
echo "\n";
//Cau 3
function getFirstValue($array) {
    echo $array[0]."\n";
}
getFirstValue([1, 2, 3]);


// Cau 4
//solution 1
$lits = array('jan', 'feb', 'march', 'april', 'may');
$delete_item = 'april';
$index_delete = array_search($delete_item, $lits);
if($index_delete !== false) {
 unset($lits[array_search($delete_item, $lits)]);
}
print_r($lits);
//solution 2
$lits = array('jan', 'feb', 'march', 'april', 'may');
$delete_item = 'april';
print_r(array_diff($lits,[$delete_item]));

echo "\n";
// Cau 5
function doubleChar($str){
    $arr = str_split($str);
    foreach($arr as &$value){
        $value = $value.$value;
    }
    echo implode($arr);
}
doubleChar('String!_ ');
echo "\n";
//Cau 6
$array = array('jan', 'feb', 'march', 'april', 'may');
$another_array = array('jan', 'msay',);
$result = array_intersect($array, $another_array);
echo count($another_array) === count($result) ? "True\n" : "False\n";

//Cau 7
$min = 10;
$max = 200;
for($i=$min;$i<=$max;$i++){
    if($i%2==0){
        echo $i.' ';
    }
}
echo "\n";
$i = $min;
do{
    if($i%2==0){
        echo $i.' ';
    }
    $i++;
}while($i<=$max);
echo "\n";

$month = 2; 
$year = 2023; 

switch ($month) {
    case 1: 
    case 3: 
    case 5: 
    case 7: 
    case 8: 
    case 10: 
    case 12: 
        $days = 31;
        break;
    case 4: 
    case 6: 
    case 9: 
    case 11: 
        $days = 30;
        break;
    case 2: 
        if (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0) {
            $days = 29; 
        } else {
            $days = 28; 
        }
        break;
    default:
        $days = 0;
}

if ($days > 0) {
    echo "Month $month year $year have $days days. \n";
} else {
    echo "Month not found.\n";
}

$myVar = "Hello";

if (is_null($myVar)) {
    echo "Variable is null.\n";
} else {
    echo "Variable is not null.\n";
}

//Cau 8
function calculateElectricityBill($units) {
    $totalCost = 0;

    if ($units <= 50) {
        $totalCost = $units * 1728;
    } elseif ($units <= 100) {
        $totalCost = 50 * 1728 + ($units - 50) * 1786;
    } elseif ($units <= 200) {
        $totalCost = 50 * 1728 + 50 * 1786 + ($units - 100) * 2074;
    } elseif ($units <= 300) {
        $totalCost = 50 * 1728 + 50 * 1786 + 100 * 2074 + ($units - 200) * 2612;
    } elseif ($units <= 400) {
        $totalCost = 50 * 1728 + 50 * 1786 + 100 * 2074 + 100 * 2612 + ($units - 300) * 2919;
    } else {
        $totalCost = 50 * 1728 + 50 * 1786 + 100 * 2074 + 100 * 2612 + 100 * 2919 + ($units - 400) * 3015;
    }

    return $totalCost;
}

$units = 50;
$billAmount = calculateElectricityBill($units);
echo "Your electricity bill for $units kWh is: $billAmount VND";

?>