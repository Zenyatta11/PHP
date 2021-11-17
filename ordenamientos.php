<?php
// si las bolas que voy a ordenarlo a mano, claramente, codigo
// es estructura de datos /Y ALGORITMOS/ por algun motivo

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pasos = 0;
$MyData = Array(25, 84, 32, 61, 12, 1, 97, 19, 23);
$WorkData = $MyData;

echo("Ordenamiento Insercion<br>");
ordenamientoInsercion();
echo("<br>Pasos: " . $pasos . "<br>");
$pasos = 0;

$WorkData = $MyData;
echo("<br><br>Ordenamiento Intercambio<br>");
ordenamientoIntercambio();
echo("<br>Pasos: " . $pasos . "<br>");
$pasos = 0;

$WorkData = $MyData;
echo("<br><br>Ordenamiento Intercambio 2<br>");
ordenamientoIntercambio2();
echo("<br>Pasos: " . $pasos . "<br>");
$pasos = 0;

$WorkData = $MyData;
echo("<br><br>Ordenamiento Seleccion<br>");
ordenamientoSeleccion();
echo("<br>Pasos: " . $pasos . "<br>");
$pasos = 0;

$WorkData = $MyData;
echo("<br><br>Ordenamiento Shellsort<br>");
ordenamientoShellsort();
echo("<br>Pasos: " . $pasos . "<br>");
$pasos = 0;

$WorkData = $MyData;
echo("<br><br>Ordenamiento QuickSort<br>");
ordenamientoQuicksort($WorkData, 0, count($WorkData)-1);
echo("<br>Pasos: " . $pasos . "<br>");
$pasos = 0;

$WorkData = $MyData;
echo("<br><br>Ordenamiento MergeSort<br>");
$WorkData = ordenamientoMergesort($WorkData);
echo("<br>Pasos: " . $pasos . "<br>");
$pasos = 0;

die();

// m a g i c

function showArray($array) {
	$max = count($array);
	
	for($i = 0; $i < $max; $i = $i + 1)
		echo($array[$i] . ($i == $max-1 ? ";<br>" : ", "));
}

function ordenamientoMergesort($arr){
	if(count($arr) == 1 ) return $arr;
	
	$mid = count($arr) / 2;
	$left = array_slice($arr, 0, $mid);
	$right = array_slice($arr, $mid);
	
	$left = ordenamientoMergesort($left);
	$right = ordenamientoMergesort($right);
	
	return merge($left, $right);
}
 
function merge($left, $right){
	global $pasos;
	
	$pasos = $pasos + 1;
	$res = array();
	
	while (count($left) > 0 && count($right) > 0){
		if($left[0] > $right[0]){
			$res[] = $right[0];
			$right = array_slice($right , 1);
		}else{
			$res[] = $left[0];
			$left = array_slice($left, 1);
		}
	}
	
	while (count($left) > 0){
		$res[] = $left[0];
		$left = array_slice($left, 1);
	}
	
	while (count($right) > 0){
		$res[] = $right[0];
		$right = array_slice($right, 1);
	}
	
	showArray($res);
	
	return $res;
}

function ordenamientoIntercambio() {
	global $WorkData, $pasos;
	
	showArray($WorkData);
	
	for ($i = 0; $i < 9-1; $i = $i + 1) {
		for ($j = 0; $j < 16-$i-1; $j = $j + 1) {
			$pasos = $pasos + 1;
			if ($WorkData[$j] > $WorkData[$j+1]) {
				$tmp = $WorkData[$j];
				$WorkData[$j] = $WorkData[$j + 1];
				$WorkData[$j+1] = $tmp;
				showArray($WorkData);
			}
		}
	}
}

function ordenamientoShellsort() {
	global $WorkData, $pasos;
	
	$inc = round(count($WorkData)/2);
	
	while($inc > 0) {
		for($i = $inc; $i < count($WorkData);$i = $i + 1) {
			$temp = $WorkData[$i];
			$j = $i;
			
			while($j >= $inc && $WorkData[$j-$inc] > $temp) {
				$WorkData[$j] = $WorkData[$j - $inc];
				$j -= $inc;
			}
			
			$pasos = $pasos + 1;
			$WorkData[$j] = $temp;
			showArray($WorkData);
		}
		
		$inc = round($inc/2.2);
	}
}

function ordenamientoIntercambio2() {
	global $WorkData, $pasos;
	
	showArray($WorkData);
	
	for ($i = 0; $i < 9-2; $i = $i + 1){
		if ($WorkData[$i] > $WorkData[$i+1]) {
			$tmp = $WorkData[$i];
			
			$WorkData[$i] = $WorkData[$i + 1];
			$WorkData[$i+1] = $tmp;
			
			$i = -1;
			$pasos = $pasos + 1;
			
			showArray($WorkData);
		}
	}
}

function partition(&$array, $left, $right) {
	global $pasos, $WorkData;
	
	$pivotIndex = floor($left + ($right - $left) / 2);
	$pivotValue = $array[$pivotIndex];
	
	$i=$left;
	$j=$right;
	
	while ($i <= $j) {
		$pasos = $pasos + 1;
		
		while ($array[$i] < $pivotValue) {
			$i = $i + 1;
		}
		
		while ($array[$j] > $pivotValue) {
			$j = $j - 1;
		}
		
		if ($i <= $j ) {
			$temp = $array[$i];
			
			$array[$i] = $array[$j];
			$array[$j] = $temp;
			
			$i = $i + 1;
			$j = $j - 1;
		}
		
		showArray($WorkData);
	}
	
	return $i;
}

function ordenamientoQuicksort(&$array, $left, $right) {
	global $pasos, $WorkData;
	
	if($left < $right) {
		$pivotIndex = partition($array, $left, $right);
		
		echo("<br>Pivot: {$pivotIndex}<br>");
		
		ordenamientoQuicksort($array,$left,$pivotIndex -1);
		ordenamientoQuicksort($array,$pivotIndex, $right);
	}
}

function ordenamientoSeleccion() {
	global $WorkData, $pasos;
	
	showArray($WorkData);
	
	for ($i = 0; $i < 9-1; $i = $i + 1) {
		$pasos = $pasos + 1;
		$min_idx = $i;
		
		for ($j = $i+1; $j < 16; $j = $j + 1)
			if ($WorkData[$j] < $WorkData[$min_idx])
				$min_idx = $j;
		
		$tmp = $WorkData[$min_idx];
		
		$WorkData[$min_idx] = $WorkData[$i];
		$WorkData[$i] = $tmp;
		
		showArray($WorkData);
	}
}

function ordenamientoInsercion() {
	global $WorkData, $pasos;
	
	showArray($WorkData);
	
	for ($i = 1; $i < 9; $i = $i + 1) {
		$pasos = $pasos + 1;
		
		$k = $WorkData[$i];
		$j = $i - 1;
		
		while ($j >= 0 && $WorkData[$j] > $k) {
			$WorkData[$j + 1] = $WorkData[$j];
			$j = $j - 1;
		}
		
		$WorkData[$j + 1] = $k;
		
		showArray($WorkData);
	}
}