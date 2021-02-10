<?php 
	session_start();
	include("db.php");
	//include("login_teacher.php");
	//$teach_id = $_SESSION["teacher_id"];

	if (isset($_POST["Password"]) && !empty($_POST["Password"])){

		AddTr($_POST["Password"]);
	}

	
	function AddTr($Password){
		echo "test2".$_SESSION["teacher_id"];
		GLOBAL $con;
		$teach_id = $_SESSION["teacher_id"];
		$sql = "UPDATE teacher SET Password='".$Password."' WHERE Number='".$teach_id."'";
		
		if($con->query($sql)==TRUE){
			echo "Password Changed Successfully";
			
		}
		else{
			echo "Error: ".$sql."<br>".$con->error;
		}
	}
	
	echo "SERVER: error";

	exit()//:  means end server connection (don't execute the rest)
?>