<?php
// Kiểm tra $date có phải là ngày chủ nhật không?
function isWeekend(DateTime $date)
{
    return $date->format("D") === "Sun";
}

// Kiểm tra xem hôm nay có lịch hẹn không
function checkMeeting()
{
    if (date('d') != 12) {
        $day = date('d') < 20 ? 20 - date('d') : 20 + date('t') - date('d');
        echo "Cách lần gặp kế tiếp còn $day ngày";
    } elseif (date('D') === "Sun") {
        echo "Có lịch hẹn vào ngày hôm nay";
    } else {
        $nextSunday = date('d-M-Y', strtotime("next sunday"));
        echo "Lịch hẹn sẽ dời đến ngày $nextSunday";
    }
}
