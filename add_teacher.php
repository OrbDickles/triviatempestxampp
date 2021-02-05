<?php 
	include("db.php");

	if (isset($_POST["Number"]) && !empty($_POST["Number"]) &&
		isset($_POST["Password"]) && !empty($_POST["Password"]) &&
		isset($_POST["Lname"]) && !empty($_POST["Lname"]) &&
		isset($_POST["Fname"]) && !empty($_POST["Fname"]) &&
		isset($_POST["Mname"]) && !empty($_POST["Mname"]) &&
		isset($_POST["SchoolID"]) && !empty($_POST["SchoolID"])){

		AddTr($_POST["Number"], $_POST["Password"], $_POST["Lname"], $_POST["Fname"], $_POST["Mname"], $_POST["SchoolID"]);
	}

	function AddTr($Number, $Password, $Lname, $Fname, $Mname, $SchoolID){
		GLOBAL $con;
		$sql = "INSERT INTO teacher (Number, Password, Lname, Fname, Mname, SchoolID) 
				VALUES ('".$Number."', '".$Password."', '".$Lname."', '".$Fname."', '".$Mname."', '".$SchoolID."')";
		
		if($con->query($sql)==TRUE){
			echo "New teacher added successfully";
		}
		else{
			echo "Error: ".$sql."<br>".$con->error;
		}
	}
	
	echo "SERVER: error";

	exit()//:  means end server connection (don't execute the rest)
?>