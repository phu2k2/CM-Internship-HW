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

    public function resize($width = null, $length = null)
    {
        if ($width < 0 || $length < 0) {
            throw new Exception("Đầu vào phải lớn hơn hoặc bằng 0");
        }
        if (!is_null($length)) {
            $this->length = $length;
        }
        if (!is_null($width)) {
            $this->width = $width;
        }
    }

    public function calculateArea()
    {
        return $this->length * $this->width;
    }
}

$rec = new Rectangle(20, 4);
echo $rec->calculateArea() . PHP_EOL;
$rec->resize(null, 5);
echo $rec->calculateArea();
