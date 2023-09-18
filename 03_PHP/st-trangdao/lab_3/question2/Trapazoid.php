<?php
include 'InterfaceAndAbstract.php';
class Trapezoid extends Shape implements Resizable
{
    private $length;
    private $width;
    private $height;
    public function resize($length = null, $width = null, $height = null)
    {
        if ($length < 0 || $width < 0 || $height < 0) {
            return "Không tồn tại giá trị";
        }
        if (!is_null($length) && !is_null($width) && !is_null($height)) {
            $this->length = $length;
            $this->width = $width;
            $this->height = $height;
        }
    }
    public function calculateArea()
    {
        return ($this->length + $this->width) * $this->height / 2;
    }
}
$class1 = new Trapezoid();
$class1->resize(40, 12, 2);
echo $class1->calculateArea();