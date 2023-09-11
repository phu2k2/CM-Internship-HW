<?php
	function recursive(){
		static $count = 0;
		if($count < 10){
			$count++;
			echo "call recursive\n";
			return recursive();
		}
		echo "final count value: ".$count;
	}
	recursive();

?>