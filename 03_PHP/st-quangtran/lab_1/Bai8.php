<?php 
// Question 8: Write a function to calculate the Electricity
// function calculateBill(int $units) {
//     $first_unit_cost = 1728;
//     $second_unit_cost = 1786;
//     $third_unit_cost = 2074;
//     $fourth_unit_cost = 2612;
//     $fifth_unit_cost = 2919;
//     $sixth_unit_cost = 3015;
//     if($units <= 50) {
//         $bill = $units * $first_unit_cost;
//     } else if($units > 50 && $units <= 100) {
//         $temp = 50 * $first_unit_cost;
//         $remaining_units = $units - 50;
//         $bill = $temp + ($remaining_units * $second_unit_cost);
//     } else if($units > 100 && $units <= 200) {
//         $temp = (50 * $first_unit_cost) + (50 * $second_unit_cost);
//         $remaining_units = $units - 100;
//         $bill = $temp + ($remaining_units * $third_unit_cost);
//     } else if($units > 200 && $units <= 300){
//         $temp = (50 * $first_unit_cost) + (50 * $second_unit_cost) + (100 * $third_unit_cost);
//         $remaining_units = $units - 200;
//         $bill = $temp + ($remaining_units * $fourth_unit_cost);
//     } else if($units > 300 && $units <= 400) {
//         $temp = (50 * $first_unit_cost) + (50 * $second_unit_cost) + (100 * $third_unit_cost) + (100 * $fourth_unit_cost);
//         $remaining_units = $units - 300;
//         $bill = $temp + ($remaining_units * $fifth_unit_cost);
//     } else {
//         $temp = (50 * $first_unit_cost) + (50 * $second_unit_cost) + (100 * $third_unit_cost) + (100 * $fourth_unit_cost) + (100 * $fifth_unit_cost);
//         $remaining_units = $units - 400;
//         $bill = $temp + ($remaining_units * $sixth_unit_cost);
//     }
//     return $bill;
// }
// Solution 2:
function calculateBill(int $units) {
    $charges = [1728, 1786, 2074, 2612, 2919, 3015];
    $range = [50, 50, 100, 100, 100, PHP_INT_MAX];
    $totalPrice = 0;
    for($i = 0; $i <= count($charges); $i++) {
        if($units <= $range[$i]) {
            $totalPrice += $charges[$i] * $units;
            break;
        } else {
            $totalPrice += $charges[$i] * $range[$i];
            $units -= $range[$i];
        }
    }
    return $totalPrice;
}
echo calculateBill(150);
?>
