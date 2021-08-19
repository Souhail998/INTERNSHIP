<?php
session_start();
include 'DbConnect.php';


$id = $_POST["searchByName"];
$query = "SELECT * FROM niveau WHERE form_id = '$id'";
$do = mysqli_query($conn,$query);
echo '<option value = ""  >'."sélectionnez le niveau".'</option>';
    while ($row = mysqli_fetch_array($do)) {

        echo '<option value = "'.$row['id'].'">'.$row['name'].'</option>';
}
?>