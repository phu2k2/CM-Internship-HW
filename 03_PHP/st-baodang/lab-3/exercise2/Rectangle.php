<?php
require('Interface.php');

class Rectangle extends Shape implements Resizable
{
    private $length;
    private $width;

    public function __construct($length, $width)
    {
        $this->length = $length;
        $this->width = $width;
    }

    /**
     * Resize rectangle's width or length if possible.
     */
    public function resize(float $width = 0, float $length = 0)
    {
        $flag = false;
        if ($length > 0) {
            $this->length = $length;
            $flag = true;
        }
        if ($width > 0) {
            $this->width = $width;
            $flag = true;
        }
        if (!$flag) {
            throw new Exception("Vui lòng nhập đầu vào hợp lệ");
        }
    }

    public function calculateArea()
    {
        return $this->length * $this->width;
    }
}

$rec = new Rectangle(20, 4);
echo $rec->calculateArea() . PHP_EOL;
$rec->resize(0, 7);
echo $rec->calculateArea() . PHP_EOL;
$rec->resize(-1, 5);
echo $rec->calculateArea();
