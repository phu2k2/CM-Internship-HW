<?php

// PHP using recursive function
function recursive($n)
{
	if ($n <= 1) {
		return $n;
	}
	else {
		return recursive($n - 1) + recursive($n - 2);
	}
}
echo recursive(5);


// Fix the Spacing
function correctSpacing($sentence){
	return trim(preg_replace('/\s+/', ' ', $sentence));
}

echo correctSpacing("The film   starts       at      midnight. ");
echo correctSpacing("The     waves were crashing  on the     shore.   ");
echo correctSpacing(" Always look on    the bright   side of  life.");


// Return the First Element in an Array?
function getFirstValue($array) {
	return $array[0];
}

// Remove specific element by value from array
$lits = array('jan', 'feb', 'march', 'april', 'may');
$delete_item = 'april';
print_r(array_diff($lits,[$delete_item]));


// Repeating letter 
function doubleChar($str){
	$str_arr = str_split($str);
    foreach ($str_arr as $iter) {
        echo $iter .= $iter;   
    }
    
}
doubleChar("String");


// How to check if an Array is a subnet of another Array?
$array = array('jan', 'feb', 'march', 'april', 'may');
$another_array = array('jan', 'may');
$result = array_intersect($array, $another_array);
echo count($result) < count($array) ? "True" : "False";


// Sử dụng FOR and DO WHILE in ra giá trị chẵn của 1 khoảng giá trị min max cho trước
$min_value = 10; 
$max_value = 30;
for ($i = $min_value; $i <= $max_value; $i++) {
    if ($i % 2 == 0) {
        echo $i . "\n";
    }
}

// Sử dụng SWITCH CASE để in ra số ngày trong tháng 
$month = 2;
switch ($month) {
    case 1:
        echo "Tháng 1 có 31 ngày.";
        break;
    case 2:
        echo "Tháng 2 có 28 hoặc 29 ngày, tùy theo năm.";
        break;
    case 3:
        echo "Tháng 3 có 31 ngày.";
        break;
    case 4:
        echo "Tháng 4 có 30 ngày.";
        break;
    case 5:
        echo "Tháng 5 có 31 ngày.";
        break;
    case 6:
        echo "Tháng 6 có 30 ngày.";
        break;
    case 7:
        echo "Tháng 7 có 31 ngày.";
        break;
    case 8:
        echo "Tháng 8 có 31 ngày.";
        break;
    case 9:
        echo "Tháng 9 có 30 ngày.";
        break;
    case 10:
        echo "Tháng 10 có 31 ngày.";
        break;
    case 11:
        echo "Tháng 11 có 30 ngày.";
        break;
    case 12:
        echo "Tháng 12 có 31 ngày.";
        break;
    default:
        echo "Tháng không hợp lệ.";
}

// Sử dụng IF ELSE để check 1 biến khác null 
$error = null;
if ($error) {
    echo 'not null';
}
else {
    echo 'null';
}

function calculate_bill(int $units) {
    $total_cost = 0;
    
    if ($units <= 50) {
        $total_cost = $units * 1728;
    } elseif ($units <= 100) {
        $total_cost = 50 * 1728 + ($units - 50) * 1786;
    } elseif ($units <= 200) {
        $total_cost = 50 * 1728 + 50 * 1786 + ($units - 100) * 2074;
    } elseif ($units <= 300) {
        $total_cost = 50 * 1728 + 50 * 1786 + 100 * 2074 + ($units - 200) * 2612;
    } elseif ($units <= 400) {
        $total_cost = 50 * 1728 + 50 * 1786 + 100 * 2074 + 100 * 2612 + ($units - 300) * 2919;
    } else {
        $total_cost = 50 * 1728 + 50 * 1786 + 100 * 2074 + 100 * 2612 + 100 * 2919 + ($units - 400) * 3015;
    }
    
    return $total_cost;
}

$units = 250;
$bill = calculate_bill($units);
echo "$units kWh: $bill đồng";


?>
