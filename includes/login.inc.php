<?php
session_start();

header('Content-type: text/html; charset=utf8'); 
include 'DbConnect.php';


if (isset($_POST['login-submit'])) {
	

	$mailuid = $_POST['mail'];
	$password = $_POST['pwd'];

	if (empty($mailuid) || empty($password)) {
		header("Location:../Header.php?error=emptyfields");
		exit(); 
	}
	else{

		$sql = "SELECT * FROM user WHERE emailUsers = ?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:../Header.php?error=sqlerror"); 
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt,"s",$mailuid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				$pwdCheck = password_verify($password, $row['pwdUsers']);
				if ($pwdCheck == FALSE) {
					header("Location:../Header.php?error=wrongpwd");
					exit();
				}
				else if ($pwdCheck == TRUE) {
					session_start();
						
						 $_SESSION['userEmail'] = $row['emailUsers'];

					header("Location:../includes/indeex.inc.php?login=success");
				}
				else
				{
					header("Location:../Header.php?error=wrongpwd");
					exit();
				}
			}
			else
			{
				header("Location:../Header.php?error=nouser");
				exit();
			}
		}
	}
}
else
{
	header("Location:../Header.php");
	exit();
}