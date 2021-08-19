<?php 
 if ($_POST['searchByName'] != '' && $_POST['searchByGender'] != '' ) {
 	
    $formation = $_POST['searchByName'];
    $niveau = $_POST['searchByGender'];
   
   $query = "SELECT * from FROM user  WHERE formationUsers = '$formation' && niveauUsers = '$niveau'";

    while ($row = mysqli_fetch_assoc($query)) {
   $data[] = array(
     "prenomUsers"=>$row['prenomUsers'],
     "nomUsers"=>$row['nomUsers'],
     "titreUsers"=>$row['titreUsers'],
     "paysUsers"=>$row['paysUsers'],
     "formationUsers"=>$row['formationUsers'],
     "niveauUsers"=>$row['niveauUsers'],
     "emailUsers"=>$row['emailUsers']
   );
}
}else {
	echo "The values are empty";
}


 ?>