<?php
    $min = 1;
    $max = 10;
    for ($i = $min; $i <= $max; $i++) {
        if ($i % 2 == 0) {
            echo $i . " "; // In ra các số chẵn
        }
    }
    $i = $min;
    do {
        if ($i % 2 == 0) {
            echo $i . " "; // In ra các số chẵn
        }
        $i++;
    } while ($i <= $max);

    $month = 2;

    switch ($month) {
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            echo "Tháng có 31 ngày.";
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            echo "Tháng có 30 ngày.";
            break;
        case 2:
            echo "Tháng có 28 hoặc 29 ngày (năm nhuận).";
            break;
        default:
            echo "Không phải là một tháng hợp lệ.";
    }
    $myVariable = "Some value";
    if ($myVariable !== null) {
        echo "Biến không phải là null.";
    } else {
        echo "Biến là null.";
    }
