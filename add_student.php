<?php 
	include_once("db.php");

	if (isset($_POST["Number"]) && !empty($_POST["Number"]) &&
		isset($_POST["Password"]) && !empty($_POST["Password"]) &&
		isset($_POST["Lname"]) && !empty($_POST["Lname"]) &&
		isset($_POST["Fname"]) && !empty($_POST["Fname"]) &&
		isset($_POST["Mname"]) && !empty($_POST["Mname"]) &&
		isset($_POST["GradeLvl"]) && !empty($_POST["GradeLvl"]) &&
		isset($_POST["SchoolName"]) && !empty($_POST["SchoolName"]) &&
		isset($_POST["TrNumber"]) && !empty($_POST["TrNumber"]) &&
		isset($_POST["Status"]) && !empty($_POST["Status"])){

		AddStud($_POST["Number"], $_POST["Password"], $_POST["Lname"], $_POST["Fname"], $_POST["Mname"], $_POST["GradeLvl"], $_POST["SchoolName"], $_POST["TrNumber"], $_POST["Status"]);
	}

	function AddStud($Number, $Password, $Lname, $Fname, $Mname, $GradeLvl, $SchoolName, $TrNumber, $Status){
		GLOBAL $con;

		$sql = "INSERT INTO student (Number, Password, Lname, Fname, Mname, GradeLvl, SchoolID, TeacherID, Status) 
				VALUES ('".$Number."', '".$Password."', '".$Lname."', '".$Fname."', '".$Mname."', '".$GradeLvl."', (SELECT SchoolID FROM school WHERE SchoolName = '".$SchoolName."'), (SELECT TeacherID FROM teacher WHERE Number = '".$TrNumber."'), ".$Status.")";
		
		if($con->query($sql)==TRUE){
			echo "New student added successfully";
		}
		else{
			echo "Error: ".$sql."<br>".$con->error;
		}
	}
	

	exit()//:  means end server connection (don't execute the rest)
?>