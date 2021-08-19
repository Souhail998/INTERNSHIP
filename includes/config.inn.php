<?php
 //if (isset($_POST['refresh'])) {
 //$formation = $_POST['Formation'];
//      $niveau = $_POST['Niveau'];
error_reporting(0);
class db{
	var $con;
	function __construct(){
		$this->$con=mysqli_connect("localhost","root","","isga") or die (mysqli_error());
		mysqli_select_db($this->$con,"project_db") or die(mysqli_error());
	}
	public function getRecords(){
		$query="SELECT * from user";
		$result=mysqli_query($this->$con,$query);
		return $result;
	}
	public function getRecordsWhere($price){
		$query="SELECT * FROM user WHERE formationUsers = '".$formation."' ;";
		$result=mysqli_query($this->$con,$query);
		return $result;
	}
	public function closeCon(){
		mysqli_close($this->$con);
	}
}


?>