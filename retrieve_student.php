<?php 
	include_once("db.php");
	
	if (isset($_POST["SchoolID"]) && !empty($_POST["SchoolID"]) &&
		isset($_POST["GradeLvl"]) && !empty($_POST["GradeLvl"])){

		RetrieveStudent($_POST["SchoolID"], $_POST["GradeLvl"]);
	}

	function RetrieveStudent($SchoolID, $GradeLvl){
		GLOBAL $con;
		$sql = $con->query("SELECT StudentID, Number, Lname, Fname, Mname, GradeLvl, SchoolID, TeacherID, Status FROM student WHERE SchoolID = ".$SchoolID." AND GradeLvl = '".$GradeLvl."'");
		//$result = $con->query($sql);
		
		while($row = $sql->fetch()){
			echo "StudentID: " .$row["StudentID"]. "|StudentNumber: " .$row["Number"]. "|LastName: " .$row["Lname"]. "|FirstName: " .$row["Fname"]. "|MiddleName: " .$row["Mname"]. "|GradeLevel: " .$row["GradeLvl"]. "|SchoolID: " .$row["SchoolID"]. "|TeacherID: " .$row["TeacherID"]. "|Status: " .$row["Status"]."<br>";
		}
	}
	
	//echo "SERVER: error";
	exit()//:  means end server connection (don't execute the rest)
?>