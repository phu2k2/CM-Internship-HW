<?php
function checkDataType($a)
{
	return gettype($a);
}
function countDataType(array $item)
{
	if (empty($item)) {
		return "[]";
	} else {
		$b = array_map("checkDataType", $item);
		return array_count_values($b);
	}
}

$item = [1, 10 / 3, "tre", [0, 1, 2], null, true];
print_r(countDataType($item));