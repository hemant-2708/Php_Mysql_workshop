<?php

require('connect.php');
$username = $_POST['username'];
$password = $_POST['password'];
$query = " SELECT * FROM logininfo, marks WHERE logininfo.id = marks.id AND logininfo.username = '$username' ";
$exequery = mysqli_query($connect, $query);
$rows = mysqli_num_rows($exequery);
if ($rows != 0){
	while($row = mysqli_fetch_assoc($exequery)){
		$dbusername = $row['username'];
		$dbpassword = $row['password'];

		if (md5($password) == $dbpassword){
			$PHP = $row['PHP'];
			$MySQL = $row['MySQL'];
			$HTML = $row['HTML'];
			$total = $row['Totalmarks'];
			$p = $row['Percentage'];
			echo "<b>UserName:</b> ".$username."<br/><br/>";
			echo "<b>Marksheet:</b> <br/>";
			echo "
			<table border='1' style='border-collapse: collapse; width: 50%;'>
			<tbody>
			<tr>
			<td style='width: 25%; text-align: center;'></td>
			<td style='width: 25%; text-align: center;'>marks</td>
			<td style='width: 25%; text-align: center;'>Total marks</td>
			<td style='width: 25%; text-align: center;'>Percentage</td>
			</tr>
			
			<tr>
			<td style='width: 25%; text-align: center;'>PHP</td>
			<td style='width: 25%; text-align: center;'>$PHP</td>
			<td style='width: 25%; text-align: center;'>100</td>
			<td style='width: 25%; text-align: center;' rowspan = '4'>$p</td>
			</tr>
			
			<tr>
			<td style='width: 25%; text-align: center;'>MySQL</td>
			<td style='width: 25%; text-align: center;'>$MySQL</td>
			<td style='width: 25%; text-align: center;'>100</td>
			</tr>
			
			<tr>
			<td style='width: 25%; text-align: center;'>HTML</td>
			<td style='width: 25%; text-align: center;'>$HTML</td>
			<td style='width: 25%; text-align: center;'>100</td>
			</tr>
			
			<tr>
			<td style='width: 25%; text-align: center;'>Total</td>
			<td style='width: 25%; text-align: center;'>$total</td>
			<td style='width: 25%; text-align: center;'>300</td>
			</tr>
			
			</tbody>
			</table>
			";
			if ($p >= 60.0){
				echo "<br/>";
				echo "<b>Congratulations!!</b>";
				echo "<br/><br/>";
			}
			echo "Mail this Marksheet: ";
			echo "<a href='send_mail.php'><button>Mail</button></a>";
			echo "<br/><br/>";
			echo "<a href='index.php'>Click here</a> to return to Home page";
		}
		else{
			echo "Incorrect Password!";
		}
	}
}
else{
	echo "User not found.<br/><a href='register.php'>Register</a>";
	echo "<br/><br/>";
}

?>