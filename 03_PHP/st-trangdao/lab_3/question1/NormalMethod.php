<?php
//normal method
class Vehicle1
{
    private $brand;
    private $model;
    private $year;
    function setBrand($brand)
    {
        $this->brand = $brand;
    }
    function getBrand()
    {
        return $this->brand;
    }
    function setModel($model)
    {
        $this->model = $model;
    }
    function getModel()
    {
        return $this->model;
    }
    function setYear($year)
    {
        $this->year = $year;
    }
    function getYear()
    {
        return $this->year;
    }
}
$class = new Vehicle1();
//set
$class->setBrand('Toyota');
$class->setModel('Nhật Bản');
$class->setYear('2022');
//get
echo $class->getBrand() . PHP_EOL;
echo $class->getModel() . PHP_EOL;
echo $class->getYear() . PHP_EOL;