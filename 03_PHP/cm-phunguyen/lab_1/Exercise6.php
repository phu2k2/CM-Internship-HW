<?php
$array = array('jan', 'feb', 'march', 'april', 'may');
$another_array = array('jan', 'may');

    #Cách 1: Sử dụng array_diff
    function checkSubnet1($arr, $sub_arr)
    {
        $key = array_diff($sub_arr,$arr);
        if(empty($key) )
            return true;
        return false;
    }

    #Cách 2: Sử dụng array_intersect
    function checkSubnet2($arr, $sub_arr)
    {
        $key = array_intersect($sub_arr,$arr);
        if((count($key) === count($sub_arr)))
            return true;
        return false;
    }

    