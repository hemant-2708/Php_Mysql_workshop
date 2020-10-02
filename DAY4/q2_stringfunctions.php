<html>
	<form action="q2_stringfunctions.php" method="GET">
		<h2>Enter any String:</h2><br/><br/>
		<input type="text" name="strname">
		<input type="submit" name="Submit" value="GO">
	</form>
</html>

<?php
if (isset($_GET['strname'])){
	$a = $_GET['strname'];
	echo "<br/>";
	$len = strlen($a); // string length
	echo "Length of given String: ".$len."<br/>";
	echo "<br/>";

	$exparray = explode(" ", $a); //breaks given string on the basis of first parameter of function.
	echo "Array of given string <br>";
	foreach ($exparray as $value) {
		echo $value;
		echo "<br/>";
	}
	
	echo "<br/>";
	$revstr = strrev($a); // Reversing a giving string.
	echo "Reverse of the String: ".$revstr."<br/>";

	echo "<br/>";
	$lowerstr = strtolower($a); //Converting the given string in all lowercase.
	echo "Given string in lowercase: ".$lowerstr."<br/>";

	echo "<br/>";
	$upperstr = strtoupper($a); //Converting the given string in all uppercase.
	echo "Given string in Uppercase: ".$upperstr."<br/>";

	echo "<br/>";
	$substr = "Nidhi";
	$newstr = substr_replace($a, $substr, 0, 6); //Replacing string with given substring
	echo "New String: ".$newstr."<br/>";
}
?>