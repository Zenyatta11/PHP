
<?php

/*
 * Complete the simpleArraySum function below.
 */
function miniMaxSum($arr) {
	sort($arr);
	
	$sumMax = 0;
	$sumMin = 0;
	$size = count($arr);
	
	for($i = 0; $i < $size; $i = $i + 1) {
		if($i == 0) {
			$sumMin = $sumMin + $arr[$i];
		} else if($i == $size - 1) {
			$sumMax = $sumMax + $arr[$i];
		} else {
			$sumMin = $sumMin + $arr[$i];
			$sumMax = $sumMax + $arr[$i];
		}
	}
	
	print($sumMin . " " . $sumMax);
}
$ar = array(1, 2, 3, 4, 5);
miniMaxSum($ar);
//$result = diagonalDifference($ar);

//print_r($result)

?>