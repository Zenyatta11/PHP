
<?php

/*
 * Complete the simpleArraySum function below.
 */
 
function staircase($n) {
	for($level = $n - 1; $level >= 0; $level = $level - 1) {
		for($i = 0; $i < $n; $i = $i + 1) {
			if($i >= $level) print("#");
			else print(" ");
		}
		
		print("<br>");
	}
}

staircase(6);
//$result = diagonalDifference($ar);

//print_r($result)

?>