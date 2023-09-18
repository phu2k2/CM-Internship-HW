<?php
require('Interface.php');

class Square extends Shape implements Resizable
{
    private $side;

    public function __construct($side)
    {
        $this->side = $side;
    }

    public function resize($side = null)
    {
        if ($side < 0) {
            throw new Exception("Đầu vào phải lớn hơn hoặc bằng 0");
        }
        if (!is_null($side)) {
            $this->side = $side;
        }
    }

    public function calculateArea()
    {
        return $this->side ** 2;
    }
}

$square = new Square(20);
echo $square->calculateArea() . PHP_EOL;
$square->resize(5);
echo $square->calculateArea();
