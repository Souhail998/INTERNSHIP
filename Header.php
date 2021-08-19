<?php
session_start();
header('Content-type: text/html; charset=utf8'); 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="description" content="">
  <meta name=viewport content="width = device-width, initial-scale = "1>
  <title></title>
  <link rel="stylesheet"  href="SSS.css">
</head>
<body>
<header>

        
        <div class="login-box"> 
        <a href="https://isga.ma/" target="_blank">
      <img src="img/logo.jpg" alt = "logo" width="100">
      </a>  
          
          <div class="text-box">
            

          <form action="includes/login.inc.php" method="post">
          
             <i class="fa fa-user" aria-hidden="true"></i>
            <label>
              <span></span>
            </label>
            <input type="email" name="mail" type="text" required autocomplete="off"/ placeholder="Nom d'utilisateur/ E-mail" style="width: 325px">
        </div>

        <div class="text-box">
          <i class="fa fa-lock" aria-hidden="true"></i>

            <label>
              <span></span>
            </label>
            <input type="password" name="pwd" required autocomplete="off"/ placeholder="Mot de passe" style="width: 325px">
          </div>
          <div class="btn">

            
            <button class="btn" type="submit" name="login-submit"> Se connecter</button>
            
          </div>
          <nav class="pwd">
            <p><a href="#">Mot de passe oublié ?</a></p>
          </nav>
           
        <!--  </div>
         
          
          
          
          </form>
           <form action="includes/logout.inc.php" method="post">
    
    <button type="submit" name="logout-submit">Logout</button>
  </form>


        </div>-->
        
      </div><!-- tab-content -->
    
</div> 
 </form> 
</header>
<nav class="Logo">
    <a href="https://isga.ma/" target="_blank">
      <img src="img/logo.jpg" alt = "logo" width="185" height="103">
      </a>  
  </nav>
<nav class="menuc">
  <nav class="menu">


  <ul>
  
    <li> <a href="https://isga.ma/" target="_blank">Accueil</a></li>
  <li>  <a href="signup.php" target="_blank">S'inscrire</a></li>
  <li>  <a href="#">Contact</a></li>
   
 
</ul>


</nav>
</nav>
 
</body>
</html>
<?php 
session_unset();
session_destroy();  

 ?>