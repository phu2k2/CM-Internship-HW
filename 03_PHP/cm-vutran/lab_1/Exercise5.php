<?php
function doubleChar($str){
    $arr = str_split($str);
    foreach($arr as &$value){
        $value = $value.$value;
    }
    echo implode($arr);
}
doubleChar('String!_ ');
