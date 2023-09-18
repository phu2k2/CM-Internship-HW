<?php
require("Parent1Trait.php");
require("Parent2Trait.php");

class Child
{
    use Parent1, Parent2 {
        Parent1::two as private Cone;
        Parent2::one as private Ctwo;
    }

    public function one()
    {
        return $this->Cone();
    }
    public function two()
    {
        return $this->Ctwo();
    }
}

$child = new Child();
$child->one();
$child->two();
