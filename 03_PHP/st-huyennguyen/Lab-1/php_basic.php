<?php

    // Write a function have to use recursive function
    function recursive()
    {
        static $i = 0;
        $i++;
        if($i < 5)
        {
            echo "Hello World!\n";
            recursive();
        }
        $i--;
    }
    recursive();


    // All words should be separated by one space and trim it
    function correctSpacing($sentence)
    {
        $result = preg_replace('/\s+/', ' ', $sentence);
        return trim($result);

    }
    echo correctSpacing("The film   starts       at      midnight. ")."\n";
    echo correctSpacing("The     waves were crashing  on the     shore.   ")."\n";
    echo correctSpacing(" Always look on    the bright   side of  life.")."\n";


    // Create a function that takes an array containing only numbers and return the element
    function getFirstValue($array) 
    {
        return array_shift($array);
    }
    echo "Giá trị đầu tiên của mảng là ".getFirstValue([1, 2, 3])."\n";
    echo "Giá trị đầu tiên của mảng là ".getFirstValue([80, 5, 100])."\n";
    echo "Giá trị đầu tiên của mảng là ".getFirstValue([-500, 0, 50])."\n";
    

    // Write a program to remove an specific element by value from array in PHP
    function delItem($array, $delete_item)
    {
        $key = array_search($delete_item,$array);
        if($key != false)
        {
            unset($array[$key]);
        }
        return $array;
    }
    $list = array('jan', 'feb', 'march', 'april', 'may');
    $delete_item = 'april';
    echo var_dump(delItem($list, $delete_item))."\n";


    // Create a function that takes a string and returns a string in which each character is repeated once
    function doubleChar($str) 
    {
        $result ='';
        for($i = 0; $i < strlen($str);$i++)
        {
            $result.= str_repeat($str[$i], 2);
        }
        return $result;
    }
    echo doubleChar("String")."\n";
    echo doubleChar("Hello World!")."\n";
    echo doubleChar("1234!_ ")."\n";


    // How to check if an Array is a subnet of another Array?
    function subnetArr($array, $another_array)
    {
        $i = count(array_intersect($array,$another_array));
        if($i = count($array)) echo "It is a subnet\n";
        else echo "It is opposite\n";
    }
    $array = array('jan', 'feb', 'march', 'april', 'may');
    $another_array = array('jan', 'may');
    subnetArr($array, $another_array);


    // Sử dụng FOR and DO WHILE in ra giá trị chẵn của 1 khoảng giá trị min max cho trước
    // For and check MinMax
    function evenNumber($a,$b)
    {
        if($a >= $b) {$max = $a; $min = $b;}
        else {$max = $b; $min = $a;}
        for($min; $min <= $max; $min++)
        {
            if($min%2 == 0) echo "$min ";
        } 
        echo "\n";
    }
    evenNumber(10,20);
    evenNumber(50,20);
    evenNumber(20,20);


    // Do while and not check MinMax
    function evenNumber_2($min, $max)
    {
        do
        {
            if ($min % 2 == 0) echo "$min ";
            $min ++;
        }
        while ($min <= $max);
        echo "\n";
    }
    evenNumber_2(10, 47);


    // Sử dụng SWITCH CASE để in ra số ngày trong tháng 
    // switch case or condition:
    function dayOfMonth($month,$year)
    {
        $checkLeapYear = ($year % 4 === 0 && $year % 100 !== 0) || ($year % 400 === 0);
        switch ($month) {
            case 2:
                if($checkLeapYear) return "Tháng $month có 29 ngày\n";
                return "Tháng $month có 28 ngày\n";
                break;
            case 1: 
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                return "Tháng $month có 31 ngày\n";
                break;
            case 4: 
            case 6:
            case 9:
            case 11:
                return "Tháng $month có 30 ngày\n";
                break;
            default:
                return "Không có tháng $month\n";
                break;
        }
    }
    echo dayOfMonth(2,2023);
    echo dayOfMonth(9,2023);
    echo dayOfMonth(8,2023);
    echo dayOfMonth(13,2023);

    // switch case check in array
    function dayOfMonth_2($month,$year)
    {
        $checkLeapYear = ($year % 4 === 0 && $year % 100 !== 0) || ($year % 400 === 0);
        $month_31 = array ("1","3","5","7","8","10","12");
        $month_30 = array ("4","6","9","11");
        switch (true) {
            case $month == 2:
                if($checkLeapYear) return "Tháng $month có 29 ngày\n";
                return "Tháng $month có 28 ngày\n";
                break;
            case in_array($month, $month_31) == true:
                return "Tháng $month có 31 ngày\n";
                break;
            case in_array($month, $month_30) == true:
                return "Tháng $month có 30 ngày\n";
                break;
            default:
                return "Không có tháng $month\n";
                break;
        }
    }
    echo dayOfMonth_2(2,2024);
    echo dayOfMonth_2(12,2024);
    echo dayOfMonth_2(11,2024);
    echo dayOfMonth_2(23,2024);

    // Sử dụng IF ELSE để check 1 biến khác null 
    function checkNull($var)
    {
        if(is_null($var)) echo "Đây là giá trị Null\n";
        else echo "$var không phải là giá trị Null\n";
    }
    checkNull(520);
    checkNull(null);

    // Write a function to calculate the electricity bill use if-else conditions or switch case.
    function calculate_bill(int $units)
    {
        $cost = 0;
        switch (true) {
            case $units > 400:
                $cost += ($units - 400) * 3015;
                $units = 400;
            case $units > 300:
                $cost += ($units - 300) * 2919;
                $units = 300;
            case $units > 200:
                $cost += ($units - 200) * 2612;
                $units = 200;
            case $units > 100:
                $cost += ($units - 100) * 2074;
                $units = 100;
            case $units > 50:
                $cost += ($units - 50) * 1786;
                $units = 50;
            default:
                $cost += $units * 1728;
                break;
        }
        echo "Chi phí phải trả là $cost đồng\n";
    }
    calculate_bill(50);