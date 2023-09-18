<?php
include 'InterfaceAndAbstract.php';
class Square extends Shape implements Resizable
{
    private $a;
    public function resize($a = null)
    {
        if ($a < 0) {
            throw new Exception("Không tồn tại giá trị");
        }
        if (!is_null($a)) {
            $this->a = $a;
        }
    }
    public function calculateArea()
    {
        return pow($this->a, 2);
    }
}
$class = new Square();
$class->resize(40);
echo $class->calculateArea();