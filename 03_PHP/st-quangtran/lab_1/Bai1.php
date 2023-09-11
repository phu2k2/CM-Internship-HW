<?php 
// Question 1: PHP using recursive function print 1 -> 10
function recursive() {
    static $result = 1;
    $condition = 10;
    echo $result.' ';
    while($result < $condition) {
        $result++;
        recursive();
    }
}
recursive();
?>
