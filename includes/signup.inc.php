<?php

session_start();


header('Content-type: text/html; charset=utf8'); 
include 'DbConnect.php';
mysqli_set_charset('utf-8');
//Connect to Database

 if (isset($_POST['signup-submit'])) {
 	
    $nom = $_POST['Nom'];
    $prenom = $_POST['Prenom'];
    $titre = $_POST['Titre'];
    $pays = $_POST['Pays'];
    $formation = $_POST['searchByName'];
 	$email = $_POST['mail'];
 	$password = $_POST['pwd'];
 	$passwordRepeat = $_POST['pwd-repeat'];
    $niveau = $_POST['searchByGender'];
    $Date = $_POST['date'];




 	if (empty($email) || empty($password) || empty($passwordRepeat)  || empty($nom) || empty($prenom) || empty($titre) || empty($pays) || empty($formation) || empty($Date)) {
 		header("Location:../signup.php?error=emptyfields&mail".$email."&Nom".$nom."&Prenom".$prenom."&Titre".$titre."&Pays".$pays."&Formation".$formation."&searchByGender".$niveau."&date".$Date); // it shows an error message and returns the user to the page where the error has been made.
 		exit();
 	}
 	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
 		header("Location:../signup.php?error=invalidmail&Nom".$nom."&Prenom".$prenom."&Titre".$titre."&Pays".$pays."&Formation".$formation."&searchByGender".$niveau."&date".$Date); 
         exit();
 			}
 	elseif (!preg_match("/^[a-zA-Z]*$/",$nom)) {
 		header("Location:../signup.php?error=invalidNom&&mail".$email."&Prenom".$prenom."&Titre".$titre."&Pays".$pays."&Formation".$formation."&searchByGender".$niveau."&date".$Date); 
         exit();
 			}		
 	elseif (!preg_match("/^[a-zA-Z]*$/",$prenom)) {
 		header("Location:../signup.php?error=invalidPrenom&&mail".$email."&nom".$nom."&Titre".$titre."&Pays".$pays."&Formation".$formation."&searchByGender".$niveau."&searchByGender".$niveau."&date".$Date); 
         exit();
 			}	
 	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z]*$/",$nom) && !preg_match("/^[a-zA-Z]*$/",$prenom) ) {
 		header("Location:../signup.php?error=invalidmailNomPrenom"); 
         exit();
         }
    elseif ($password !== $passwordRepeat) {
         		header("Location:../signup.php?error=passwordcheck&mail".$email."&Nom".$nom."&Prenom".$prenom."&Titre".$titre."&Pays".$pays."&Formation".$formation."&searchByGender".$niveau."&date".$Date);
         		exit();
         	}     	
    	 else{

      
   $sql = "SELECT emailUsers FROM user WHERE emailUsers= ?";
   $stmt =mysqli_stmt_init($conn);

    	// is to check if mysql failed to connect and execute 
    	if (!mysqli_stmt_prepare($stmt,$sql)) {
    		header("Location:../signup.php?error=sqlerror"); 
              exit();
    	}

     else{
     	mysqli_stmt_bind_param($stmt,"s",$email);
     	mysqli_stmt_execute($stmt);
     	mysqli_stmt_store_result($stmt);
     	$resultCheck = mysqli_stmt_num_rows($stmt);
     	if ($resultCheck>0) {
     		header("Location: ../signup.php?error=emailtaken");
     		exit();
     	}
     	else{
     		
     		$sql = "INSERT INTO user(emailUsers, nomUsers , prenomUsers ,paysUsers , titreUsers, formationUsers, niveauUsers, pwdUsers , dateUsers) VALUES (?, ?, ?, ?, ?, ?, ?, ? ,?)";

     		$stmt =mysqli_stmt_init($conn);

    	// is to check if mysql failed to connect and execute 
    	if (!mysqli_stmt_prepare($stmt,$sql)) {
    		header("Location:../signup.php?error=sqlerror"); 
    		
         exit();
     	}
        else{
        $HashPwd = password_hash($password, PASSWORD_DEFAULT); 
     	     mysqli_stmt_bind_param($stmt, "sssssssss" ,$email,$nom,$prenom, $pays, $titre, $formation, $niveau,$HashPwd,$Date );
     	     mysqli_stmt_execute($stmt);
     	     header("Location: ../signup.php?signup=sucess");
     	     exit();
     }	
        	
}
}
  }
 
mysqli_stmt_close($stmt);
mysqli_close($conn);
}
else{
	header("Location: ../signup.php");
	exit();
} 