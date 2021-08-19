<?php
include 'DbConnect.php';
$conn->query("SET NAMES utf8");
$conn->query("SET CHARACTER SET uft8");
## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

## Custom Field value
$searchByName = $_POST['searchByName'];
$searchByGender = $_POST['searchByGender'];

## Search 
$searchQuery = " ";
if($searchByName != ''){
   $searchQuery .= " and (formationUsers like '%".$searchByName."%' ) ";
}
if($searchByGender != ''){
   $searchQuery .= " and (niveauUsers='".$searchByGender."') ";
}
if($searchValue != ''){
   $searchQuery .= " and (prenomUsers like '%".$searchValue."%' or 
      nomUsers like '%".$searchValue."%' or 
      emailUsers like '%".$searchValue."%' or 
      titreUsers like '%".$searchValue."%' or 
      paysUsers like'%".$searchValue."%' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as allcount from user");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($conn,"select count(*) as allcount from user WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from user WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
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

## Response
$response = array(
  "draw" => intval($_POST["draw"]),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo json_encode($response);