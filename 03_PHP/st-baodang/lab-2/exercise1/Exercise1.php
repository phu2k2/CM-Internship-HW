<?php
// Date time, include and require
include("Utils.php");

$date = new DateTime();
echo isWeekend($date) ? "Là cuối tuần" : "Không phải cuối tuần";
echo "\n";


checkMeeting();
