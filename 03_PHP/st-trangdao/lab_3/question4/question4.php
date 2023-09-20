<?php

class Zoology
{
    public final function Move()
    {
        return "An animal that crawls on land";
    }
}

final class GreenIguana extends Zoology
{
    public function color()
    {
        return "Green iguanas are green";
    }
}
