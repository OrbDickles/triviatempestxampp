<?php 
    session_start();
	include("db.php");

	if (isset($_POST["Room_ID"]) && !empty($_POST["Room_ID"]) &&
		isset($_POST["Topic"]) && !empty($_POST["Topic"]) ){

            CreateRm($_POST["Room_ID"], $_POST["Topic"]);
	}

	function CreateRm($Room_ID, $Topic){
        
        echo "testTeacherRoom".$_SESSION["teacher_id"];
		GLOBAL $con;
        $teach_id = $_SESSION["teacher_id"];

		$sql = "INSERT INTO room (RoomID, TeacherID, Topic) 
				VALUES ('".$Room_ID."', '".$teach_id."', '".$Topic."')";
		
		if($con->query($sql)==TRUE){
			echo "New room Created successfully";
		}
		else{
			echo "Error: ".$sql."<br>".$con->error;
		}
	}
	
	echo "SERVER: error";

	exit()//:  means end server connection (don't execute the rest)
?>