
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


echo $email;
echo $prenom ;
echo $titre;
echo $pays;
echo $formation;
echo $email;
echo $niveau;
echo $password;
echo $passwordRepeat;

 ?>
</body>
</html>

