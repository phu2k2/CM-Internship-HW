<?php
require 'exercise_1.1.php';
function checkCurrentDate()
{
    $currentDate = date("Y-m-d");
    $day = date("d");
    if ($day == 20) {
        $checkWeekend = isWeekend($currentDate);
        if ($checkWeekend) {
            return "Bạn có lịch hẹn vào ngày hôm nay";
        } else {
            $nextWeekend = date("d-m-Y", strtotime("Next Sunday"));
            return "Lịch hẹn sẽ dời đến ngày $nextWeekend";
        }
    } else {
        if ($day < 20) {
            $diff = 20 - $day;
        } else {
            $diff = date("t") + 20 - $day;
        }
        $nextDay20 = date("d-m-Y", strtotime(date("Y-m-d") . "+ $diff days"));
        return "Từ ngày hiện tại đến ngày 20 gần nhất là ngày $nextDay20 cách $diff ngày";
    }
}

echo checkCurrentDate();
