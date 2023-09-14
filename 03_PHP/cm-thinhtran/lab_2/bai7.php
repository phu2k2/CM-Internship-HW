<?php
    $anonymous = function($array, $filterlenght){
        return array_filter($array, function ($element) use ($filterlenght) {
            return (strlen($element) <= $filterlenght) !== false;
        });
    };

    $array = ["mouse", "cat", "dog"];
    $filterLength = 4;
    print_r($anonymous($array, $filterLength));
?>