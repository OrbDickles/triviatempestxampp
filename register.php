<?php 
	include("db.php");

	if (isset($_POST["SchoolName"]) && !empty($_POST["SchoolName"])){

		Register($_POST["SchoolName"]);
	}

	function Register($SchoolName){
		GLOBAL $con;
		$sql = "INSERT INTO school (SchoolName) VALUES ('".$SchoolName."')";
		
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