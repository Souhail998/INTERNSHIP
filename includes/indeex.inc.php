
<?php 
include 'DbConnect.php';
session_start();
if ($_SESSION["userEmail"]) {
  $_SESSION["userEmail"];
}else{
header("location:../Header.php");
}


 ?>
<!-- Datatable CSS -->
<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

<link href='main.css' rel='stylesheet' type='text/css'>

<link href='util.css' rel='stylesheet' type='text/css'>

<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Datatable JS -->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet"  href="SSS3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="jquery.min.js"></script>
<!-- HTML -->

<script>
  $(document).ready(function(){
    $('#searchByName').on('change',function(){
      var name = $(this).val();
      if (name) {
        $.post(
          "model.php",
          {searchByName: name},
          function(data){
            $('#searchByGender').html(data);

          }
          );
      }else{
               $('#searchByGender').html('<option>sélectionnez la formation premièrement</option>');
      }
    });
   });

</script>


  <nav class="menuc">
    <div class="Symb"> 
        <a>
      <img src="logo.jpg" alt = "logo" width="185" height="103">
      </a>  
    </div>
  <nav class="menu"> 
    <a href="logout.inc.php">
    <button type="submit" name="logout-submit">Se déconnecter</button>
        </a>
</nav>
</nav>
   <!-- Custom Filter -->

              <div class="srch-box">
            <span>
        <select id='searchByName' class="">
           <option value="" selected disabled hidden>sélectionnez la formation</option>
               <?php 
                  
                   $query = "SELECT * FROM formation";
                   $do = mysqli_query($conn,$query);
                   echo '<option value = "" >'."sélectionnez la formation".'</option>';
                   while ($row = mysqli_fetch_array($do)) {
                     echo '<option value = "'.$row['name'].'">'.$row['name'].'</option>';

                   }
                 ?>
      </select>
   
         <select id='searchByGender' class="">
           <option value="" selected disabled hidden>sélectionnez le niveau</option>
                 
           
         </select>
         </span>
      </div> 
         
      
   

   <!-- Table -->
      <table class="t01"  id='empTable' >
  <thead class="black white-text">
       <tr>
         <th>Prenom</th>
         <th>Nom</th>
         <th>Titre</th>
         <th>Pays</th>
         <th>Formation</th>
         <th>Niveau</th>
         <th>E-mail</th>
       </tr>
     </thead>

   </table>
</div>
<script type="text/javascript">
$(document).ready(function(){
  var dataTable = $('#empTable').DataTable({
    'processing': true,
    'serverSide': true,
    'serverMethod': 'post',
    //'searching': false, // Remove default Search Control
    'ajax': {
       'url':'ajaxfile.php',
       'data': function(data){
          // Read values
          var gender = $('#searchByGender').val();
          var name = $('#searchByName').val();

          // Append to data
          data.searchByGender = gender;
          data.searchByName = name;
       }
    },
    'columns': [
       { data: 'prenomUsers' }, 
       { data: 'nomUsers' },
       { data: 'titreUsers' },
       { data: 'paysUsers' },
       { data: 'formationUsers' },
       { data: 'niveauUsers' },
       { data: 'emailUsers' },
    ]
  });

  $('#searchByName').keyup(function(){
    dataTable.draw();
  });

  $('#searchByGender').change(function(){
    dataTable.draw();
  });
 
  });

</script>