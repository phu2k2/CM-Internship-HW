<?php
    // Solution 1 :
    function calculate_bill_1(int $units) {
        $total_bill = 0;
    
        if ($units <= 50) {
            $total_bill = $units * 1728; // 1728 đồng/kWh
        } elseif ($units <= 100) {
            $total_bill = (50 * 1728) + (($units - 50) * 1786); // Cho 50 kWh đầu 1728 đồng/kWh, cho 50 kWh tiếp theo 1786 đồng/kWh
        } elseif ($units <= 200) {
            $total_bill = (50 * 1728) + (50 * 1786) + (($units - 100) * 2074); 
        } elseif ($units <= 300) {
            $total_bill = (50 * 1728) + (50 * 1786) + (100 * 2074) + (($units - 200) * 2612); 
            $total_bill = (50 * 1728) + (50 * 1786) + (100 * 2074) + (100 * 2612) + (($units - 300) * 2919); 
        } else {
            $total_bill = (50 * 1728) + (50 * 1786) + (100 * 2074) + (100 * 2612) + (100 * 2919) + (($units - 400) * 3015); 
        }
        return $total_bill;
    }
    
    $units = 180; 
    $bill = calculate_bill($units);
    echo "Hóa đơn tiền điện cho $units kWh là: $bill đồng";

    //Solution 2:
    function calculate_bill(int $units) {
        // Định nghĩa mảng giới hạn và giá trị tương ứng
        $range=[50,50,100,100,100];
        $rate_limits = [50, 100, 200, 300, 400];
        $rate_values = [1728, 1786, 2074, 2612, 2919, 3015];
        $total_bill = 0;
        $remaining_units = $units;
        // Duyệt qua mảng giới hạn và tính tổng hóa đơn
        for ($i = 0; $i < count($rate_limits); $i++) {
            if ($remaining_units <= 0) {
                break;
            }
            if ($remaining_units <= $rate_limits[$i]) {
                $total_bill += ($remaining_units-$rate_limits[$i-1] )* $rate_values[$i];
                break;
            } else {
                $total_bill += $range[$i]* $rate_values[$i];
            }
        }
        return $total_bill;
    }
    $units = 101; 
    $bill = calculate_bill($units);
    echo "Hóa đơn tiền điện cho $units kWh là: $bill đồng";
