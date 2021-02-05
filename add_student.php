<?php 
	include("db.php");

	if (isset($_POST["Number"]) && !empty($_POST["Number"]) &&
		isset($_POST["Password"]) && !empty($_POST["Password"]) &&
		isset($_POST["Lname"]) && !empty($_POST["Lname"]) &&
		isset($_POST["Fname"]) && !empty($_POST["Fname"]) &&
		isset($_POST["Mname"]) && !empty($_POST["Mname"]) &&
		isset($_POST["GradeLvl"]) && !empty($_POST["GradeLvl"]) &&
		isset($_POST["SchoolID"]) && !empty($_POST["SchoolID"]) &&
		isset($_POST["TrGameID"]) && !empty($_POST["TrGameID"])){

		AddTr($_POST["Number"], $_POST["Password"], $_POST["Lname"], $_POST["Fname"], $_POST["Mname"], $_POST["GradeLvl"], $_POST["SchoolID"], $_POST["TrGameID"]);
	}

	function AddTr($Number, $Password, $Lname, $Fname, $Mname, $GradeLvl, $SchoolID, $TrGameID){
		GLOBAL $con;
		$sql = "INSERT INTO student (Number, Password, Lname, Fname, Mname, GradeLvl, SchoolID, TrGameID) 
				VALUES ('".$Number."', '".$Password."', '".$Lname."', '".$Fname."', '".$Mname."', '".$GradeLvl."', '".$SchoolID."', '".$TrGameID."')";
		
		if($con->query($sql)==TRUE){
			echo "New student added successfully";
		}
		else{
			echo "Error: ".$sql."<br>".$con->error;
		}
	}
	
	echo "SERVER: error";

	exit()//:  means end server connection (don't execute the rest)
?>