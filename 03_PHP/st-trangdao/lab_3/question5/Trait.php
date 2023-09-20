<?php

trait Trait1
{
    protected function callName()
    {
        echo "go to bed";
    }
}

trait Trait2
{
    protected function callName()
    {
        echo "go to work";
    }
}

class Move
{
    use Trait1, Trait2 {
        Trait2::callName insteadof Trait1;
        Trait1::callName as callNameTrait1;
    }

    function move()
    {
        $this->callName();
    }

    function moveTrait1()
    {
        $this->callNameTrait1();
    }
}

$class = new Move();
echo $class->move() . PHP_EOL;
echo $class->moveTrait1() . PHP_EOL;
