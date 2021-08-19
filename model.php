<?php
session_start();
include 'DbConnect.php';
if (isset($_POST['searchByName']) && !empty($_POST['searchByName'])) {

$id = $_POST['searchByName'];
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