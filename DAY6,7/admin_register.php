<html>
	<form action="admin_register.php" method="POST">
		<table>
			<tr>
				<td>Enter Admin Username:</td> 
				<td><input type="text" name="aname"></td>
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
if (isset($_POST['aname'], $_POST['password'])){
	$aname = $_POST['aname'];
	$password = $_POST['password'];
	$confirmpassword = $_POST['copassword'];
	$checkquery = " SELECT admin_name FROM admin WHERE admin_name = '$aname' ";
	$execheckquery = mysqli_query($connect, $checkquery);
	$count = mysqli_num_rows($execheckquery);
	if ($count != 0){
		echo "Admin already exists!";
		echo "<br/>";
		echo "<a href = 'admin_login.php'>Click here</a> to return to login page.";
	}
	else{
		if($password == $confirmpassword){
			if (strlen($aname)>25){
				echo "admin name length should not be more than 25 characters!";
			}
			else{
				// encrypting passwords
				$password = md5($password);
				$confirmpassword = md5($confirmpassword);

				//Inserting Values in Database
				$query = "INSERT INTO admin (admin_name, password) VALUES ('$aname', '$password')";
				mysqli_query($connect, $query);
				die("You have been registerd! <a href = 'admin_login.php'>Return to login page</a>");
			}
		}	
		else{
			echo "Please check your password";
		}
	}
}
?>