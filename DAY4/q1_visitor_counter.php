<?php
require('connect_for_q1.php');



$update = "UPDATE table01 SET count = count+1 WHERE id=1";
$a = mysqli_query($connect, $update);

$display = "SELECT count FROM table01 where id=1";
$b = mysqli_query($connect, $display);
while ($row = $b->fetch_assoc()){
	echo "Visitors count on this page: ".$row['count'];
}

if (!$a || !$b)
	echo "Error: ".mysqli_error($connect);
?>