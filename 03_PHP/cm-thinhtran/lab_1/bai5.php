<?php
  function doubleChar($str) {
    $new_str = "";
    foreach(str_split($str) as $char){
      $new_str = $new_str.str_repeat((string)$char,2);
    }
    return $new_str;
  }
  $str = "String";    
  $str1 = "Hello World!";
  $str2 = "1234!_ ";
  print_r(doubleChar($str2));
?>