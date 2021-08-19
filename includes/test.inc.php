<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php
		session_start();
   if (isset($_POST['signup-submit'])) {
 	
    $nom = $_POST['Nom'];
    $prenom = $_POST['Prenom'];
    $titre = $_POST['Titre'];
    $pays = $_POST['Pays'];
    $formation = $_POST['Formation'];
 	$email = $_POST['mail'];
 	$password = $_POST['pwd'];
 	$passwordRepeat = $_POST['pwd-repeat'];
    $niveau = $_POST['Niveau'];

echo " ".$password." ".$passwordRepeat." ".$titre." ".$prenom." ".$pays." ".$email." ".$formation." ".$niveau." ".$nom;

}
	?>

</body>
</html>