<?php
  function deleteSpecifyItem($list, $delete_item){
    $new_list = array();
    foreach($list as $value){
      if($value !== $delete_item){
        array_push($new_list, $value);
      }
    }
    return $new_list;
  }
  $list = array('jan', 'feb', 'march', 'april', 'may');
  $delete_item = 'april';
  print_r(deleteSpecifyItem($list, $delete_item));
?>