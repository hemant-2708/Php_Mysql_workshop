<?php
error_reporting(0);
$connect = mysqli_connect("127.0.0.1", "root", "");

mysqli_select_db($connect, 'result');
echo "Connected<br/>";

?>