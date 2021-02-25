<?php 
	include_once("db.php");
	
	if (isset($_POST["SchoolID"]) && !empty($_POST["SchoolID"])){

		RetrieveTeacher($_POST["SchoolID"]);
	}

	function RetrieveTeacher($SchoolID){
		GLOBAL $con;
		$sql = $con->query("SELECT TeacherID, Number, Lname, Fname, Mname, SchoolID, Status FROM teacher WHERE SchoolID = ".$SchoolID."");
		//$result = $con->query($sql);
		
		while($row = $sql->fetch()){
			echo "TeacherID: " .$row["TeacherID"]. "|TeacherNumber: " .$row["Number"]. "|LastName: " .$row["Lname"]. "|FirstName: " .$row["Fname"]. "|MiddleName: " .$row["Mname"]. "|SchoolID: ".$row["SchoolID"]. "|Status: ".$row["Status"].";";
		}
	}
	
	//echo "SERVER: error";
	exit()//:  means end server connection (don't execute the rest)
?>