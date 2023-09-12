<?php
// Kiểm tra $date có phải là ngày chủ nhật không?
function isWeekend(DateTime $date)
{
    return $date->format("D") === "Sun";
}

// Kiểm tra xem hôm nay có lịch hẹn không
function checkMeeting()
{
    if (date('d') != 20) {
        $day = date('d') < 20 ? 20 - date('d') : 20 + date('t') - date('d');
        echo "Cách lần gặp kế tiếp còn $day ngày";
    } elseif (date('D') === "Sun") {
        echo "Có lịch hẹn vào ngày hôm nay";
    } else {
        $nextSunday = date('d', strtotime("next sunday"));
        $day = $nextSunday - date('d');
        echo "Lịch hẹn sẽ dời đến ngày $nextSunday, cách hiện tại còn $day ngày";
    }
}
