<?php
function doubleChar($str) {
  $rs="";
  for($i=0;$i<strlen($str);$i++){
  	$rs = $rs.$rs[$i].$rs[$i];
  }
  echo $rs;
}
