<?php
class Loggger
{
    private static $logCount = 0;
    function __construct()
    {
        self::$logCount += 1;
    }
    public static function totalLogCount()
    {
        return self::$logCount;
    }
}
echo Loggger::totalLogCount() . PHP_EOL;
$class = new Loggger();
echo Loggger::totalLogCount() . PHP_EOL;
$class = new Loggger();
$class = new Loggger();
echo Loggger::totalLogCount() . PHP_EOL;