<?php
require('connect.php');
if (isset($_POST['adminname'], $_POST['password'])) {
	$admin_username = (isset($_POST['adminname']) ? $_POST['adminname']: null);
	$password = (isset($_POST['password']) ? $_POST['password']: null);
	$pquery = " SELECT * FROM admin WHERE admin_name = '$admin_username' ";
	$exepquery = mysqli_query($connect, $pquery);
	$rows = mysqli_num_rows($exepquery);
	if ($rows != 0){
		while ($row = mysqli_fetch_assoc($exepquery)){
			$dbadmin = $row['admin_name'];
			$dbpassword = $row['password'];
			if (md5($password) == $dbpassword){
				echo "Login Sucessful.";
				echo "
				<table>
					<tr><td><a href='admin_addresult.php'><button>Add Result</button></a></td></tr>
					<tr><td><a href='admin_updateresult.php'><button>Update Result</button></a></td></tr>
					<tr><td><a href='admin_delete.php'><button>Delete Record</button></a></td></tr>
				</table>
				";
			}
			else{
				echo "Incorrect Password!";
			}
		}
	}
	else{
		echo "Admin not found!<br/><a href='admin_register.php'>Register</a>";
	}	
}
?>