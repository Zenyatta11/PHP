
<?php

/*
 * Complete the simpleArraySum function below.
 */
function birthdayCakeCandles($candles) {
    
	sort($candles);
	$sum = 0;
	$size = count($candles);
	
	for($i = $size-1; $i >= 0 ; $i = $i - 1) {
		if($candles[$i] == $candles[$size-1]) $sum = $sum + 1;
		else break;
	}
	
	return $sum;
}
$ar = array(3, 3, 3, 3, 3);

$result = birthdayCakeCandles($ar);
print_r($result)

?>