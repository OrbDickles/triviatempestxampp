<?php 
	include_once("db.php");

	if (isset($_POST["Number"]) && !empty($_POST["Number"]) &&
		isset($_POST["Password"]) && !empty($_POST["Password"]) &&
		isset($_POST["Lname"]) && !empty($_POST["Lname"]) &&
		isset($_POST["Fname"]) && !empty($_POST["Fname"]) &&
		isset($_POST["Mname"]) && !empty($_POST["Mname"]) &&
		isset($_POST["SchoolName"]) && !empty($_POST["SchoolName"]) &&
		isset($_POST["Status"]) && !empty($_POST["Status"])){

		AddTr($_POST["Number"], $_POST["Password"], $_POST["Lname"], $_POST["Fname"], $_POST["Mname"], $_POST["SchoolName"], $_POST["Status"]);
	}

	function AddTr($Number, $Password, $Lname, $Fname, $Mname, $SchoolName, $Status){
		GLOBAL $con;
		$sql = "INSERT INTO teacher (Number, Password, Lname, Fname, Mname, SchoolID , Status) 
				VALUES ('".$Number."', '".$Password."', '".$Lname."', '".$Fname."', '".$Mname."', (SELECT SchoolID FROM school WHERE SchoolName = '".$SchoolName."'), ".$Status.")";
		
		if($con->query($sql)==TRUE){
			echo "New teacher added successfully";
		}
		else{
			echo "Error: ".$sql."<br>".$con->error;
		}
	}
	
	//echo "SERVER: error";

	exit()//:  means end server connection (don't execute the rest)
?>