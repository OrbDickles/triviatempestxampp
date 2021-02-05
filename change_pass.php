<?php 
	include("db.php");

	if (isset($_POST["Number"]) && !empty($_POST["Number"]) &&
		isset($_POST["Password"]) && !empty($_POST["Password"])){

		AddTr($_POST["Number"], $_POST["Password"]);
	}

	function AddTr($Number, $Password){
		GLOBAL $con;
		$sql = "UPDATE teacher SET Password='".$Password."' WHERE Number='".$Number."'";
		
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