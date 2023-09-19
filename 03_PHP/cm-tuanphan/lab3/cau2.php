<?php

interface Resizable
{
    public function resize($factor);
}

abstract class Shape
{
    abstract public function calculateArea();
}

class Square extends Shape implements Resizable
{
    private $factor; 

    public function __construct($factor){
        $this->factor = $factor;
    }

    public function resize($factor) {
        $this->factor = $factor;
    }

    public function calculateArea() {
        return $this->factor * $this->factor;
    }
}

$square = new Square(5);
echo "Square Area: " . $square->calculateArea() . PHP_EOL;
$square->resize(10);
echo "Square Area: " . $square->calculateArea() . PHP_EOL;
