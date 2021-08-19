
<?php 
include 'DbConnect.php';

 ?>
 <meta http-equiv="Content-Type" content="text/html"; charset="utf8">
<!-- Datatable CSS -->
<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Datatable JS -->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


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




<div >
   <!-- Custom Filter -->
   <table>
     <tr>
       <td>
       	<select id='searchByName'>
           <option value="">sélectionnez la formation</option>
               <?php 
                  
                   $query = "SELECT * FROM formation";
                   $do = mysqli_query($conn,$query);
                   while ($row = mysqli_fetch_array($do)) {
                     echo '<option value = "'.$row['id'].'">'.$row['name'].'</option>';

                   }
                 ?>
      </select>
       </td>
       <td>
         <select id='searchByGender'>
           <option value=''>-- Select Gender--</option>
         </select>
       </td>
     </tr>
   </table>

   <!-- Table -->
   <table id='empTable' class='display dataTable'>
     <thead>
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
  
});</script>