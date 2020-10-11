<html>
	<form action="admin_delete.php" method="POST">
		Enter Student's id: <input type="number" name="id"><br/>
		<input type="submit" name="submit" value="Delete">
	</form>
</html>

<?php

require('connect.php');

if (isset($_POST['id'])){
	$id = $_POST['id'];
	$query = " SELECT * FROM marks WHERE id = '$id' ";
	$exequery = mysqli_query($connect, $query);
	$rows = mysqli_num_rows($exequery);
	if ($rows != 0){
		$query_1 = " DELETE FROM marks WHERE id = '$id' ";
		mysqli_query($connect, $query_1);
		echo "Record deleted Sucessfully.";
	}
	else{
		echo "Record not found!";
		echo "<br/><br/>";
		echo "<a href = 'index.php'>Click here</a> to return to home page.";
	}
}

?>