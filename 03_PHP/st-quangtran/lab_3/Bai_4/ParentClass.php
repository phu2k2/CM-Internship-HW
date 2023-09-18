<?php
class ParentClass
{
    final public function finalMethod()
    {
    }
}

final class ChildClass extends ParentClass
{
    public function finalMethod()
    {
    }
}

class GrandClass extends ChildClass
{
}
