<?php
//solution 1
function calculateElectricityBill($units) {
    $totalBill = 0;

    if ($units <= 50) {
        $totalBill = $units * 1728;
    } elseif ($units <= 100) {
        $totalBill = 50 * 1728 + ($units - 50) * 1786;
    } elseif ($units <= 200) {
        $totalBill = 50 * 1728 + 50 * 1786 + ($units - 100) * 2074;
    } elseif ($units <= 300) {
        $totalBill = 50 * 1728 + 50 * 1786 + 100 * 2074 + ($units - 200) * 2612;
    } elseif ($units <= 400) {
        $totalBill = 50 * 1728 + 50 * 1786 + 100 * 2074 + 100 * 2612 + ($units - 300) * 2919;
    } else {
        $totalBill = 50 * 1728 + 50 * 1786 + 100 * 2074 + 100 * 2612 + 100 * 2919 + ($units - 400) * 3015;
    }

    return $totalBill;
}

//solution 2
function calculateElectricityBill2($units) {
    $range = [50, 50, 100, 100, 100];
    $unitLimits = [50, 100, 200, 300, 400];
    $unitRates = [1728, 1786, 2074, 2612, 2919, 3015];
    $totalBill = 0;
    
    if($units <= 50){
        return $units * 1728;
    }
    for ($i = 0; $i < count($unitLimits); $i++) {
        if ($units <= $unitLimits[$i]) {
            $totalBill += ($units - $unitLimits[$i - 1]) * $unitRates[$i];
            break;
        } else {
            $totalBill += $range[$i] * $unitRates[$i];
        }
    }
    return $totalBill;
}
$units = 320;

$billAmount = calculateElectricityBill($units);
echo "Solution 1|your electricity bill for $units kWh is: $billAmount VND\n";

$billAmount = calculateElectricityBill2($units);
echo "Solution 2|your electricity bill for $units kWh is: $billAmount VND";