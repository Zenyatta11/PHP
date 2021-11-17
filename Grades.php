
If the difference between the grade and the next multiple of 5 is less than 3, round up to the next multiple of 5.
If the value of grade is less than 38, no rounding occurs as the result will still be a failing grade.

<?php

function gradingStudents($grades) {
    // Write your code here
	$len = count($grades);
	
	for($i = 0; $i < $len; $i = $i + 1) {
		$tmp = $grades[$i];
		if($tmp < 38) continue;
		if((5 - $tmp % 5) < 3) $grades[$i] = $tmp + (5 - $tmp % 5);		
	}
	
	return $grades;
}

$arr = array(73, 67, 38, 33);

print_r(gradingStudents($arr));
?>