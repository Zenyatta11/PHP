
<?php
ini_set('display_errors', 1);

/*
 * Complete the simpleArraySum function below.
 */
 
function timeConversion($s) {
    $s = explode(":", $s);
	$size = count($s);
	
	if(stripos($s[$size-1],"PM") && intval($s[0]) != 12)
		$s[0] = strval(intval($s[0])+12);
	else if(stripos($s[$size-1],"AM") && intval($s[0]) == 12)
		$s[0] = strval(intval($s[0])-12);
	
	$returnVal = "";
	
	for($i = 0; $i < $size; $i = $i + 1) {
		$returnVal = $returnVal . (strlen($s[$i]) < 2 ? "0" : "") . $s[$i];
		if($i + 1 < $size) $returnVal = $returnVal . ":";
	}
	
	return str_ireplace("AM", "",str_ireplace("PM", "",$returnVal));
}

$result = timeConversion("12:05:45AM");
print_r($result)

?>