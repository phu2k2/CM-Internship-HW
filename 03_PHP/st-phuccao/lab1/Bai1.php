<?php
// Write a function have to use recursive function
$counter = 0;
function recursive() {
    global $counter;
    if ($counter >= 5) {
        return;
    }
    echo "Lần đệ quy thứ " . ($counter + 1) . "\n";
    $counter++;
    recursive();

}
recursive();
