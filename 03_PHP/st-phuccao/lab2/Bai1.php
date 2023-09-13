<?php

function isSunday(DateTime $date)
{
    return $date->format("w") === "0";
}

function checkSchedule($currentDate)
{
    // Lấy ngày trong tháng hiện tại
    $dayOfMonth = (int) $currentDate->format("d");
    // Kiểm tra xem ngày hiện tại có phải là ngày 20 không
    if ($dayOfMonth != 20) {
        echo "Hôm nay là ngày $dayOfMonth, không phải ngày 20 của tháng.\n";
        if ($dayOfMonth < 20) {
            // Lấy ngày 20 của tháng hiện tại
            $next20th = new DateTime($currentDate->format("Y-m-20"));
        } else {
            // Lấy ngày 20 của tháng tiếp theo
            $next20th = new DateTime(date("Y-m-20", strtotime("+1 month")));
        }
        // Tính số ngày còn lại
        $interval = $currentDate->diff($next20th);
        $daysLeft = $interval->days;
        echo "Số ngày còn lại đến ngày 20 gần nhất : " . $daysLeft . " ngày.\n";
    } else {
        if (isSunday($currentDate)) {
            echo "Hôm nay bạn có lịch hẹn.\n";
        } else {
            $remainingDays = 7 - $currentDate->format("w");
            $nextSundayTimestamp = time() + $remainingDays * 24 * 60 * 60;
            $nextSundayFormatted = date("Y-m-d", $nextSundayTimestamp);
            echo "Lịch hẹn sẽ dời đến ngày $nextSundayFormatted.";
        }
    }
}

// Tạo một đối tượng DateTime từ một ngày
$dateToCheck = new DateTime("2023-08-20");
// Kiểm tra ngày có phải cuối tuần hay không
if (isSunday($dateToCheck)) {
    echo "Ngày " . $dateToCheck->format("Y-m-d") . " là ngày cuối tuần.\n";
} else {
    echo "Ngày " . $dateToCheck->format("Y-m-d") . " không phải là ngày cuối tuần.\n";
}

// Lấy ngày hiện tại
$currentDate = new DateTime();
checkSchedule($currentDate);
