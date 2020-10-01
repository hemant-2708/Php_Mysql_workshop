<?php

$matrix1 = array(array(7, 4), array(11, 6));
$matrix2 = array(array(4, 1), array(4, 2));

for ($i = 0; $i < 2; $i++){
	for ($j = 0; $j < 2; $j++){
		echo $matrix1[$i][$j] + $matrix2[$i][$j]." ";
	}
	echo "<br>";
}

?>