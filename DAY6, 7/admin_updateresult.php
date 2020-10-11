<html>
	<form action = 'admin_updateresult.php' method = 'POST'>
		Student's Id: <input type='tel' name='id'><br/><br/>
		Student's Username: <input type='text' name='username'><br/>
		<table>
			<tr>
				<td>Sub</td>
				<td>Marks</td>
			</tr>
							
			<tr>
				<td>PHP</td>
				<td><input type='tel' name='mPHP' maxlength='3' max='100'></td>
			</tr>
							
			<tr>
				<td>MySQL</td>
				<td><input type='tel' name='mMySQL' maxlength='3' max='100'></td>
			</tr>
							
			<tr>
				<td>HTML</td>
				<td><input type='tel' name='mHTML' maxlength='3' max='100'></td>
			</tr>
			<br/>
			<br/>
			<tr>
				<td><input type='submit' name='submit'></td>
			</tr>
		</table>
	</form>
</html>

<?php

require('connect.php');
if (isset($_POST['id'], $_POST['username'], $_POST['mPHP'], $_POST['mMySQL'], $_POST['mHTML'])){
	$id = $_POST['id'];
	$s_username = $_POST['username'];
	$PHP = $_POST['mPHP'];
	$MySQL = $_POST['mMySQL'];
	$HTML = $_POST['mHTML'];
	$total = $PHP + $MySQL + $HTML;
	$p = ($total/300)*100;
	$query = " SELECT * FROM marks WHERE id = '$id' ";
	$exequery = mysqli_query($connect, $query);
	$rows = mysqli_num_rows($exequery);
	if ($rows != 0){
		$query_1 = " UPDATE marks SET PHP = '$PHP', MySQL = '$MySQL', HTML = '$HTML', Totalmarks = '$total', Percentage = '$p' WHERE id = '$id' ";
		mysqli_query($connect, $query_1);
		echo "Record Updated Sucessfully.";
	}
	else{
		echo "Student Not found<br/><br/>";
		echo "Rgister Student:- <a href = 'register.php'>Click Here</a><br/>";
		echo "<br/>OR</br>";
		echo "<br/><a href = 'index.php'>Click here</a> to return to home page.";
	}
}

?>