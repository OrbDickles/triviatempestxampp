<?php 
	include_once("db.php");

	if (isset($_POST["SchoolName"]) && !empty($_POST["SchoolName"]) &&
		isset($_POST["Status"]) && !empty($_POST["Status"])){

		Register($_POST["SchoolName"], $_POST["Status"]);
	}

	function Register($SchoolName, $Status){
		GLOBAL $con;
		$sql = "INSERT INTO school (SchoolName, Status) VALUES ('".$SchoolName."', ".$Status.")";
		
		if($con->query($sql)==TRUE){
			echo "New school registered successfully";
		}
		else{
			echo "Error: ".$sql."<br>".$con->error;
		}
	}
	
	echo "SERVER: error";

	exit()//:  means end server connection (don't execute the rest)
?>