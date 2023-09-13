<?php 
function isWeekend($date) {
    $weekDay = date('w', strtotime($date));
    return $weekDay == 0;
}

function daysUntilNext20th() {
    $currentDate = new DateTime(date('Y-m-d'));
    $next20th = new DateTime(date('Y-m-20'));

    // Nếu ngày hiện tại lớn hơn ngày 20 trong tháng, dời ngày 20 đến tháng tiếp theo
    if($currentDate > $next20th) {
        $next20th->modify('+1 month');
    }

    $daysUntil20th = $currentDate->diff($next20th)->days;
    return $daysUntil20th;
}
function getNextSunday() {
    $currentDate = new DateTime(date('Y-m-d'));
    $nextSunday = $currentDate->modify('next Sunday')->format('Y-m-d');
    return $nextSunday;
}

?>
