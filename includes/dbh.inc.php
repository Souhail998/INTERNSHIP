<?php
header('Content-type: text/html; charset=utf8'); 
$servername = "localhost";
$dBUsername = "root";
$dBpassword = "";
$dBname = "isga";
mysqli_set_charset('utf8');
//Connect to Database
$conn = mysqli_connect($servername,$dBUsername,$dBpassword,$dBname);
 if (!$conn) {
 	die("Connection failed".mysqli_connect_error());
 }