<?php 
	include("db.php");

	if (isset($_POST["Room_ID"]) && !empty($_POST["Room_ID"]) &&
		isset($_POST["Answer"]) && !empty($_POST["Answer"]) &&
		isset($_POST["Description"]) && !empty($_POST["Description"])){

		AddQs($_POST["Room_ID"], $_POST["Answer"], $_POST["Description"]);
	}

	function AddQs($Room_ID, $Answer, $Description){
		GLOBAL $con;
		$sql = "INSERT INTO questions (RoomID, Answer, Description) 
				VALUES ('".$Room_ID."', '".$Answer."', '".$Description."')";
		
		if($con->query($sql)==TRUE){
			echo "New Question added successfully";
		}
		else{
			echo "Error: ".$sql."<br>".$con->error;
		}
	}
	
	echo "SERVER: error";

	exit()//:  means end server connection (don't execute the rest)
?>