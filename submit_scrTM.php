<?php 
	include_once("db.php");
	session_start();
	if (isset($_POST["RoomID"]) && !empty($_POST["RoomID"]) &&
	isset($_POST["Score"]) && !empty($_POST["Score"])
	){

		SubmitScore( $_POST["RoomID"], $_POST["Score"]);
	}

	function SubmitScore($Room_ID, $Score)
    {
		GLOBAL $con;
		
		$sql = "INSERT into score(StudentID, RoomID, StudScore) VALUES('".$_SESSION["student_id"]."', '".$Room_ID."', '".$Score."')";
		$st=$con->prepare($sql);

		if($con->query($sql)==TRUE){
			echo "Scores added successfully!";
		}
		else{
			echo "Error: ".$sql."<br>".$con->error;
		}
	}	
	exit() //:means end server connection (don't execute the rest)
?>
