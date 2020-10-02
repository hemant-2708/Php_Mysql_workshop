<html>
	<h1>Upload a file...</h1>
	<form action='q3_fileupload.php' method='POST' enctype="multipart/form-data">
		<input type='file' name='myfile'><p>
		<input type='submit' value='Upload'>
	</form>
</html>  

<?php
	if (isset($_FILES['myfile'])){
		$name = $_FILES["myfile"]["name"];
		$type = $_FILES["myfile"]["type"];
		$size = $_FILES["myfile"]["size"];
		$temp = $_FILES["myfile"]["tmp_name"];
		//$error = $_FILES["myfile"]["error"];
		echo "<br>";
		echo "File name: ".$name."<br/>";
		echo "File type: ".$type."<br/>";
		echo "File size: ".$size."<br/>";
		echo "Current Location: ".$temp."<br/>";
	}	
?>