<?php

function checkSubArr($another_array, $array)
{
    // Tìm sự khác biệt giữa $another_arr$another_array, $arrayay và $array
    $diff = array_diff($another_array, $array);
    // Nếu không có sự khác biệt nào, $another_array là một subnet của $array
    $is_subnet = empty($diff);
    if ($is_subnet) {
        return true; // $another_array là một subnet của $array
    } else {
        return false; // $another_array không phải là một subnet của $array
    }
}
$array = ["jan", "feb", "march", "april", "may"];
$another_array = ["jan", "may"];
echo checkSubArr($another_array, $array);

