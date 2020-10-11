<html>
	<form action="send_mail.php" method="POST">
		Enter username: <input type="text" name="username"><br/><br/>
		Enter mail-id: <input type="email" name="send"><br/><br/>
		<input type="submit" name="submit" value="SEND">
	</form>
</html>

<?php
require('connect.php');
$username = (isset($_POST['username']) ? $_POST['username']: null);
$q = " SELECT * FROM logininfo, marks WHERE logininfo.id = marks.id AND logininfo.username = '$username' ";
$exeq = mysqli_query($connect, $q);
if (isset($_POST['send'])){
	$to = $_POST['send'];
	if (mysqli_num_rows($exeq) > 0){
		while ($row = mysqli_fetch_assoc($exeq)){
			$PHP = $row['PHP'];
			$MySQL = $row['MySQL'];
			$HTML = $row['HTML'];
			$total = $row['Totalmarks'];
			$p = $row['Percentage'];

			$subject = $username."'s Marksheet";
			$body = "PHP: ".$PHP."\nMySQL: ".$MySQL."\nHTML: ".$HTML."\nTotal marks obtained: ".$total."\n Percentage: ".$p;
			mail($to, $subject, $body);
			echo "Mail Sent";
			echo "<br/><br/>";
			echo "<a href = 'index.php'>Click here</a> to return to home page.";
		}
	}
}
?>