<?php
	function getEvenValuesUsingFor($min, $max){
		for ($i = $min + 1; $i < $max; $i++){
			if($i % 2 == 0){
				echo $i." ";
			}
		}
	}

	function getEvenValuesUsingDoWhile($min, $max){
		$i = $min + 1;
		do{
			if($i % 2 == 0){
				echo $i." ";
			}
			$i++;
		}while($i < $max);
	}

	function isLeapYear($year){
		if ($year % 400 == 0 || ($year % 4 == 0 && $year % 100 != 0)) 
			return true; 
		return false;
	}

	function getAmountOfDaysOfMonth($year, $month){
		switch ($month) {
			case 1:
			case 3:
			case 5:
			case 7:
			case 8:
			case 10:
			case 12:
				print_r(31);
				break;
			case 4:
			case 6:
			case 9:
			case 11:
				print_r(30);
				break;
			case 2:
				print_r((isLeapYear($year) ? 29 : 28));
				break;
			default:
				print_r("Invalid month");
		}
	}

	function isNull($check){
		if($check == null) return true;
		else return false;
	}

	$min = 0;
	$max = 5;
	print_r("Get even number:\n");
	print_r(getEvenValuesUsingFor($min, $max));
	print_r("\n");
	print_r(getEvenValuesUsingDoWhile($min, $max));

	print_r("\nAmount of days: ");
	print_r(getAmountOfDaysOfMonth(2023, 9));

	print_r("\nIs null: ");
	print_r(isNull(null));

?>