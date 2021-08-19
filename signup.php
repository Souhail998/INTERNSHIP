
<?php
session_start();
header("content-type: text/html; charset=UTF-8");  
include 'DbConnect.php';

?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title></title>
  <link rel="stylesheet"  href="SSS2.css"><head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html;charset=utf8" /> 
  <meta charset="UTF-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="jquery.min.js"></script>



<script>
  $(document).ready(function(){
    $('#searchByName').on('change',function(){
      var searchByName = $('#searchByName').val();
        $.ajax({
                      type:"post",
                      url:"model.php",
                      data:"searchByName="+searchByName,
                      success:function(data){
                              $("#searchByGender").html(data);
                      }
                     });
    });
   });

</script>


</head>
<body>
  <header>
    <nav>

<div class="Symb"> 
        <a href="https://isga.ma/" target="_blank">
      <img src="img/logo.jpg" alt = "logo" width="100">
      </a>  
    </div>
    <form action="includes/signup.inc.php" method="post">
<div class="Regestration">
   
 <div class="text-box2">   
   
     <div>     
          
              <label>
                 <span class="req"></span>
              </label>
              <input type="text" name = "Nom" required autocomplete="off" / width="300" placeholder="Votre Nom:">
          

</div>
             
   <div>           
              <label>
                 <span class="req"></span>
              </label>
              <input type="text" name = "Prenom" required autocomplete="off" / width="300" placeholder="Votre prenom:">
            
</div>
     
<div>
            <label>
               <span class="req"></span>
            </label>
             <select  name="Titre" required autocomplete="off" width="300">
              <option value="" selected disabled hidden>Titre</option>
               <option>M</option>
               <option >Mlle</option>
               <option>Mme</option>
             </select>
          </div>
          <div>

          <input placeholder="Date de naissance" class="textbox-n" type="text" onfocus="(this.type='date')" name="date">


          </div>

<div>
            <label>
              <span class="req"></span>
            </label>
             <select  name="Pays" required autocomplete="off" width="300">
              <option value="" selected disabled hidden>Pays</option>
               <option>Maroc</option>
                <option>Angola</option>
               <option>Benin</option>
               <option>Botswana</option>
               <option>Burkina Faso</option>
               <option>Cameroun</option>
               <option>Republique du cango</option>
               <option>Republique democratique du cango</option>
               <option>Cote d'Ivoire</option>
               <option>Djibouti</option>
               <option>Gabon</option>
               <option>Ghana</option>
               <option>Guinee</option>
               <option>Kenya</option>
               <option>Liberia</option>
               <option>Malawi</option>
               <option>Mali</option>
               <option>Mauritanie</option>
               <option>Nambie</option>
               <option>Niger</option>
               <option>Nigeria</option>
               <option>Ouganda</option>
               <option>Rwanda</option>
               <option>Senegal</option>
               <option>Tchad</option>
               <option>Togo</option>
               <option>Zambie</option>
               <option>Autre</option>
             </select>
             </div>

   <div class="form-group">
      <select name="searchByName" id="searchByName" class="form-control" required>
       <option value="">sélectionnez la formation</option>
            
                 <?php  
                   $query = "SELECT * FROM formation";
                   $do = mysqli_query($conn,$query);
                   while ($row = mysqli_fetch_array($do)) {
                     echo '<option value = "'.$row["name"].'">'.$row["name"].'</option>';

                   }
                 ?>
      </select>
     </div>
     <div class="form-group">
      <select name="searchByGender" id="searchByGender" class="form-control" required>
       <option value="">sélectionnez le niveau</option>
       
      </select>
     </div>
     



      <div>           
            <label>
               <span class="req"></span>
            </label>
            <input type="email" name = "mail" required autocomplete="off" width="300" / placeholder="Email-Address:">
        </div>
        <div>  

                    <label>
               <span class="req"></span>
            </label>
            <input type="password" name = "pwd" required autocomplete="off" width="300"/ placeholder="Saisir un Mot-De-Passe:">
      </div>
      <div>  
            <label>
              <span class="req"></span>
            </label>
            <input type="password" name = "pwd-repeat" required autocomplete="off" width="300"/ placeholder="Ressaisir le Mot-De-Passe: ">
          
</div>
          </div>
         
        

            <div class="btn2">
            <button  class="btn2" type="submit" name="signup-submit" > Inscrivez vous !</button>
            
          </div>
	</div>
  </div>
   </form> 
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
  <li>  <a href="Header.php" target="_blank">S'identifier</a></li>
  <li>  <a href="#">Contact</a></li>
   
 
</ul>


</nav>
</nav>
</body>
</header>
</nav>
</html>

	  
