<html>
	<form action="q1_md5.php" method="POST">
		Username<br/>
		<input type="text" name="username"><br/>
		Password<br/>
		<input type="password" name="password"><br/><br/>
		<input type="submit">
	</form>
</html>

<?php
require('connect_for_md5program.php');
if (isset($_POST['username'], $_POST['password'])){
	$a = $_POST['username'];
	$b = $_POST['password'];
	$enc = md5($b);

	$query = "INSERT INTO userdata (username, password) VALUES ('$a', '$enc')";
	$c = mysqli_query($connect, $query);

	if ($c){
		echo "Table updated Sucessfully with new record!";
	}
	else{
		echo "ERROR: ".mysqli_error($connect);
	}
}
?>