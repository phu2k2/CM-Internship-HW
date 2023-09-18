<?php
class Circle extends Shape implements Resizable
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function getRadius()
    {
        return $this->radius;
    }

    public function resize($amount = null)
    {
        if ($amount > 0) {
            return $this->radius *= $amount;
        }
    }

    public function calculateArea()
    {
        return pi() * pow($this->radius, 2);
    }
}
