<?php 
	include("db.php");
	session_start();
	if (isset($_POST["Number"]) && !empty($_POST["Number"]) && 
		isset($_POST["Password"]) && !empty($_POST["Password"])){

		Login($_POST["Number"], $_POST["Password"]);
	}

	function Login($Number, $Password){
		GLOBAL $con;

		$sql = "SELECT TeacherID FROM teacher WHERE Number=? AND Password=?";
		$st=$con->prepare($sql);

		$st->execute(array($Number, $Password));//encrypt password here
		$all=$st->fetchAll();
		if (count($all) == 1){
			//echo "SERVER: Number".$all[0]["Number"];
			$_SESSION["teacher_id"] = $all[0]["TeacherID"]; //now store $Number in a session variable
			
			echo "test".$_SESSION["teacher_id"];
			exit();
		}

		//if IdNumber or password are empty strings
		echo "SERVER: error, invalid Number or password";
		exit();
	}

	echo "SERVER: error";

	exit()//:  means end server connection (don't execute the rest)
?>