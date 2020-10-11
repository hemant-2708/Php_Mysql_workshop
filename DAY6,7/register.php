<html>
	<form action="register.php" method="POST">
		<table>
			<tr>
				<td>Enter your Username:</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Enter your Password:</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td>Confirm your Password:</td>
				<td><input type="password" name="copassword"></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="Register"></td>
			</tr>
		</table>
	</form>
</html>

<?php
require('connect.php');
if (isset($_POST['username'], $_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirmpassword = $_POST['copassword'];
	$checkquery = " SELECT username FROM logininfo WHERE username = '$username' ";
	$execheckquery = mysqli_query($connect, $checkquery);
	$count = mysqli_num_rows($execheckquery);
	if ($count != 0){
		echo "Student with this username already exists!";
		echo "<br/>";
		echo "<a href='index.php'>Click here</a> to return to Home page";
	}
	else{
		if($password == $confirmpassword){
			if (strlen($username)>25){
				echo "Username length should not be more than 25 characters!";
			}
			else{
				// encrypting passwords
				$password = md5($password);
				$confirmpassword = md5($confirmpassword);

				//Inserting Values in Database
				$query = "INSERT INTO logininfo (username, password) VALUES ('$username', '$password')";
				mysqli_query($connect, $query);
				die("You have been registerd! <a href = 'index.php'>Return to login page</a>");
			}
		}	
		else{
			echo "Please check your password";
		}
	}
}
?>