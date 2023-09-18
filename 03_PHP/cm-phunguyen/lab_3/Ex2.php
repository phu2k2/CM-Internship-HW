<?php
interface Resizable
{
    public function resize($percentage);
}
abstract class Shape
{
    abstract public function calculateArea();
} 
class Rectangle extends Shape implements Resizable
{
    private $width;
    private $height;

    public function __construct($width,$height)
    {
        $this->width = $width;
        $this->height = $height;
    }
    public function calculateArea()
    {
        return $this->width * $this->height;
    }
    public function resize($percentage)
    {
        $this->width *= $percentage/100;
        $this->height *= $percentage/100;
    }

}


//Test 
$rectangle = new Rectangle(12,17);
echo "The rectangular area before resization is: ".$rectangle->calculateArea().".".PHP_EOL;
$rectangle->resize(80);
echo "The rectangular area after resization is: ".$rectangle->calculateArea().".";
