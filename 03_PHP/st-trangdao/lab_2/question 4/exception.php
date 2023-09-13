<?php
function divide(string $b)
{
    if (empty($b)) {
        throw new Exception("Biến truyền vào là rỗng ", 400);
    }
    if (!is_string($b)) {
        throw new Exception("Biến truyền vào không phải kiểu string", 500);
    }
    $mail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    $url = '/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i';
    if (!preg_match($mail, $b) && !preg_match($url, $b)) {
        throw new Exception("Biến truyền vào không xác thực", 442);
    }
}
try {
    divide("thuytrangdao240402@gmail..com");
} catch (\Exception $e) {
    echo $e->getCode();
    echo "\n";
    echo $e->getMessage();
    echo "\n";
}
try {
    divide("http:home.com");
} catch (\Exception $e) {
    echo $e->getCode();
    echo "\n";
    echo $e->getMessage();
    echo "\n";
}
try {
    divide("thuytrangdao240402@gmail.com");
} catch (\Exception $e) {
    echo $e->getCode();
    echo "\n";
    echo $e->getMessage();
    echo "\n";
}