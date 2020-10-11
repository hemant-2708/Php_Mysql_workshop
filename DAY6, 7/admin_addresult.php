<html>
	<form action = 'admin_addresult.php' method = 'POST'>
		Student's Username: <input type='text' name='username'><br/><br/><br/>
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
if (isset($_POST['username'], $_POST['mPHP'], $_POST['mMySQL'], $_POST['mHTML'])){
	$s_username = $_POST['username'];
	$PHP = $_POST['mPHP'];
	$MySQL = $_POST['mMySQL'];
	$HTML = $_POST['mHTML'];
	$query = "SELECT * FROM logininfo WHERE username = '$s_username' ";
	$exequery = mysqli_query($connect, $query);
	$rows = mysqli_num_rows($exequery);
	if ($rows != 0){
		$total = $PHP + $MySQL + $HTML;
		$p = ($total/300)*100;
		echo "Total marks obtained: ".$total;
		echo "<br/>";
		echo "Percentage: ".$p;
		echo "<br/><br/>";
		$query_1 = "INSERT INTO marks (username, PHP, MySQL, HTML, Totalmarks, Percentage) VALUES ('$s_username', '$PHP', '$MySQL', '$HTML', '$total', '$p') ";
		$exequery_1 = mysqli_query($connect, $query_1);
		if ($exequery_1){
			echo "Marks table updated Sucessfully.";
			echo "<br/>";
			echo "<a href = 'index.php'>Click here</a> to return to home page.";
		}
	}
	else{
		echo "Student Not found<br/><br/>";
		echo "Rgister Student:- <a href = 'register.php'>Click Here</a><br/>";
		echo "<br/>OR</br>";
		echo "<br/><a href = 'index.php'>Return to Homepage</a>";
	}
}
?>