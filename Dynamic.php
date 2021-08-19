<meta charset="UTF-8">
<?php
session_start();
header('Content-type: text/html; charset=utf8'); 
$servername = "localhost";
$dBUsername = "root";
$dBpassword = "";
$dBname = "isga";

//Connect to Database
$conn = mysqli_connect($servername,$dBUsername,$dBpassword,$dBname);
 if (!$conn) {
 	die("Connection failed".mysqli_connect_error());
 }

if (isset($_POST['filter_formation']) && !empty($_POST['filter_formation'])) {

$id = $_POST['filter_formation'];
$query = "SELECT * FROM niveau WHERE form_id = '$id'";
$do = mysqli_query($conn,$query);
$count = mysqli_num_rows($do);

if ($count > 0) {
	while ($row = mysqli_fetch_array($do)) {
		echo '<option value = "'.$row['id'].'">'.$row['name'].'</option>';
	}
	
}else{
	echo '<option>Aucun niveau disponible</option>';

}

}else{
	echo '<h1>Erreur</h1>';
}

?>