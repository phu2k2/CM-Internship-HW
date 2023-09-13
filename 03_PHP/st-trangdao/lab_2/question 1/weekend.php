<?php
function isWeekend(string $d)
{
	if (date('l',strtotime($d)) === 'Sunday') {
		return "Ngày đó là chủ nhật.\n";
	} else {
		return "Ngày đó không phải là chủ nhật.\n";
	}
}
function checkDay20AndMeeting()
{
	$a = 0;
	if (date('d') !== '20') {
		echo "Ngày hôm nay không phải ngày 20. \n";
		if (date('d') < 20) {
			$a = 20 - date('d');
		} else {
			$a = date('t') - date('d') + 20;
		}
		echo "Còn $a ngày nữa đến ngày 20 kế tiếp.\n";
	} elseif (date('l') === 'Sunday') {
		echo "Có lịch hẹn vào ngày hôm nay.\n";
	} else {
		$nextSunday = date('d-m-Y', strtotime("next Sunday"));
		$b = 7 - date('N');
		echo "Lịch hẹn sẽ dời đến $nextSunday . Còn $b ngày nữa đến lịch hẹn.\n";
	}
}