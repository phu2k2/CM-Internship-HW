<?php
$items = [1, 2.0, "str", [1], true, null, "helloWorld"];

// Tạo một array trả về số lượng của từng kiểu dữ liệu từ $items truyền vào.
function countDataType(array $items)
{
    if (empty($items)) {
        return [];
    }

    $dataType = array_map(function ($value) {
        return gettype($value);
    }, $items);
    $result = array_count_values($dataType);
    return $result;
}

print_r(countDataType($items));
