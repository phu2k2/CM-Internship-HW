<?php
$array = array('jan', 'feb', 'march', 'april', 'may');
$another_array = array('jan', 'may');
// Tìm sự khác biệt giữa $another_array và $array
$diff = array_diff($another_array, $array);
// Nếu không có sự khác biệt nào, $another_array là một subnet của $array
$is_subnet = empty($diff);
if ($is_subnet) {
    echo "True"; // $another_array là một subnet của $array
} else {
    echo "False"; // $another_array không phải là một subnet của $array
}
