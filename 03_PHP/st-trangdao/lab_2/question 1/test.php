<?php
//use include
include 'weekend.php';

echo isWeekend(new DateTime('2023-07-09'));
checkDay20AndMeeting();

//use require
require 'weekend.php';

echo isWeekend(new DateTime('2023-07-09'));
checkDay20AndMeeting();