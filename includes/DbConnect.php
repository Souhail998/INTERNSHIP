<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "isga"; /* Database name */

$conn = mysqli_connect($host, $user, $password,$dbname);
$conn->query("SET NAMES utf8");
$conn->query("SET CHARACTER SET uft8");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}