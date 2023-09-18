<?php
class Logger
{
    public static $logCount = 0;
    public static function totalLogCount($message)
    {
        echo $message .PHP_EOL;
        self::$logCount++;
    }
}

//test
$logger = new Logger();
$logger->totalLogCount("Message 1");
$logger->totalLogCount("Message 2");
$logger->totalLogCount("Message 3");
echo "Total log count: " . Logger::$logCount . ".";
