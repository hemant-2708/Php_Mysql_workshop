<html>
	<form action="q2_send_mail.php" method="POST">
		Name: <input type="text" name="username"><br/><br/>
		Email: <input type="email" name="mail"><br/><br/>
		Feedback<br/>
		<p><textarea name="feedback"> </textarea></p>
		<br/>
		<input type="submit" name="submit">
	</form>
</html>

<?php

if (isset($_POST['submit'])){
	$a = $_POST['username'];
	$to = $_POST['mail'];
	$msg = $_POST['feedback'];
	$subject = "Acknowledgement fo Feedback.";
	$body = "Thank you for your Invaluable feedback";
	$send = mail($to, $subject, $body);
	if ($send){
		echo "Feedback recorded Sucessfully.";
	}
	else{
		echo "Feedback not recorded!";
	}
	$admin = //add administrator's email id;
	$subject_1 = "Input Recieved.";
	$body_1 = "User Info: \n Name: ".$a."\n Email: ".$to."\n Feedback: ".$msg;
	mail($admin, $subject_1, $body_1);

}

?>