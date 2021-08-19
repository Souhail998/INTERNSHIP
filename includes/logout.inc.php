<?php 

header('Content-type: text/html; charset=utf8'); 
session_start();
unset($_SESSION["userEmail"]);
session_destroy();
header("Location:../Header.php");


 ?>