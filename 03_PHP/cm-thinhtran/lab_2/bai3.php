<?php
    function my_callback($item) {
        return gettype($item);
    }

    $items = [1,1,2.0, "string", [1], true, null, null];
    function countDataType($items){
        $result = array();
        foreach(array_map("my_callback", $items) as $type){
            $result[$type] = isset($result[$type]) ? ($result[$type] + 1) : 1;
        }
        return $result;
    }
    print_r(countDataType($items));