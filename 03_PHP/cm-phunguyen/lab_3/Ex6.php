<?php
trait A
{
    public function methodA1()
    {
        echo "Method A1 from Trait A" . PHP_EOL;
    }
    public function methodA2()
    {
        echo "Method A2 from Trait A" . PHP_EOL;
    }
}

trait B
{
    public function methodA1()
    {
        echo "Method A1 from Trait B" . PHP_EOL;
    }
    public function methodA2()
    {
        echo "Method A2 from Trait B" . PHP_EOL;
    }
}

class MyClass
{
    use A, B {
        A::methodA2 insteadof  B;
        B::methodA1 insteadof A;
    }

    public function Two()
    {
        $this->methodA2();
    }

    public function One()
    {
        $this->MethodA1();
    }
}
$obj = new MyClass();
$obj->Two();
$obj->One();
