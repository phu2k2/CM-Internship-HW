<?php
function calculateBill2(int $units)
{
    $x = 0;
    $bill = 0;
    $cost = [1728, 1786, 2074, 2612, 2919, 3015];
    $var = [50, 50, 100, 100, 100];
    if ($units > 50) {
        if ($units > 400)
            $x = 1;
        else if ($units <= 400 && $units > 300)
            $x = 2;
        else if ($units <= 300 && $units > 200)
            $x = 3;
        else if ($units <= 200 && $units > 100)
            $x = 4;
        else
            $x = 5;
        for ($i = 0; $i < count($var) + 1 - $x; $i++)
            $bill += $var[$i] * $cost[$i];
        $bill += $cost[count($cost) - $x] * ($units - array_sum(array_slice($var, 0, count($var) + 1 - $x)));
    } else {
        $bill += $cost[0] * $units;
    }
    return $bill;
}
