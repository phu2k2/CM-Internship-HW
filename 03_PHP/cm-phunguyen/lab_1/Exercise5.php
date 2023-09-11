<?php
    function doubleChar($str) {
        $pieces = str_split($str);
        $resultArr = array();
        foreach ($pieces as $value) {
            $resultArr[] = $value;
            $resultArr[] = $value;
        }
        $resultStr = implode($resultArr);
        return $resultStr;
    }

