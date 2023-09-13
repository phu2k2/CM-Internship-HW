<?php
    function isWeekend($date)
    {
        date('d', strtotime($date));
        $weekDay = date('w', strtotime($date));
        return $weekDay == 0 ;
    }
    //echo isWeekend("2023-09-18");

    function meetingScheduled($dayMet) {
        if (date("d") != $dayMet) {
            echo "Còn " . (date('d') < $dayMet ? $dayMet - date('d') : date('t') - date('d') + $dayMet) . " ngày là đến ngày hẹn";
        }
        else {
            echo "Hôm nay là ngày 20";
            if (isWeekend(date("Y-m-d"))) {
                echo "Bạn có lịch hẹn tham gia buổi họp vào ngày hôm nay";
            }
            else {
                $day_left = abs(date('w') - 7);
                echo "Còn $day_left là đến ngày CN tiếp theo \n";
                echo "Lịch hẹn sẽ dời đến ngày " . date('Y-m-' . date('d') + $day_left);
            }
        }
    }

    meetingScheduled(20);