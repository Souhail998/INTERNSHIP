<?php 
if ($_POST['searchByName'] != '' && $_POST['searchByGender'] != '') 
 {
   
    $formation = $_POST['searchByName'];
    $niveau = $_POST['searchByGender'];
    $conn = mysqli_connect('localhost','root','','isga');
    $query = "select * from user where niveauUsers = '$niveau' and formationUsers = '$formation'";
    $result = mysqli_query($conn,$query);
 echo '<table border = "3">';
 echo '<tr>';
 echo '<th>Prenom</th>';
 echo '<th>Nom</th>';
 echo '<th>Titre</th>';
 echo '<th>Pays</th>';
 echo '<th>Formation</th>';
 echo '<th>Niveau</th>';
 echo '<th>E-mail</th>';
  echo '</tr>';
      while ($output = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'.$output['prenomUsers'].'</td>';
        echo '<td>'.$output['nomUsers'].'</td>';
        echo '<td>'.$output['titreUsers'].'</td>';
        echo '<td>'.$output['paysUsers'].'</td>';
        echo '<td>'.$output['formationUsers'].'</td>';
        echo '<td>'.$output['niveauUsers'].'</td>';
        echo '<td>'.$output['emailUsers'].'</td>';
        echo '</tr>';
              };
             echo '</table>';
             mysqli_close($conn) ;
    
  }










