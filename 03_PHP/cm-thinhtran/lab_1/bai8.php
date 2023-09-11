<?php

  $stepPrices = [
   1728 => 50,
   1786 => 50,
   2074 => 100,
   2612 => 100,
   2919 => 100,
   3015 => 1
  ]; 

  function calculateBill(int $units) {
    global $stepPrices;
    $totalPrice = 0;
    foreach($stepPrices as $price => $step) {
      if($step == 1) $step = $units;
      if($units < $step){
        $totalPrice += $units * $price;
        break;
      }
      $totalPrice += $step * $price;
      $units = $units - $step;
    }
    return $totalPrice;
  } 
  print_r(calculateBill(120));





?>