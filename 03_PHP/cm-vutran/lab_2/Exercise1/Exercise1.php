<?php

function isWeekend()
{
    return date('w') == 0;
}

function isDay20()
{
    return date('d') == 20;
}

function distanceWithDay20()
{
    if (date('d') < 20) {
        return 20 - date('d');
    }
    return 20 + date('t') - date('d');
}

function nearestSunDay()
{
    $nextSunday = date('Y-m-d', strtotime("next sunday"));
    return $nextSunday;
}


function checkSchedule($currentDate)
{
    echo "Ngày hiện tại: $currentDate \n";

    if (!isDay20($currentDate)) {
        echo "Hôm nay không phải là ngày 20.\n";
        $distanceDay = distanceWithDay20($currentDate);
        echo "Còn $distanceDay ngày nữa sẽ đến ngày 20 gần nhất\n";
    } else {
        echo "Hôm nay là ngày 20.\n";
        if (isWeekend()) {
            echo "Hôm nay là cuối tuần. Bạn có lịch hẹn vào ngày hôm nay.";
        } else {
            $sundayDate = nearestSunDay();
            echo "Lịch hẹn sẽ dời đến ngày $sundayDate";
        }
    }
}

$currentDate = date('Y-m-d');
checkSchedule($currentDate);
