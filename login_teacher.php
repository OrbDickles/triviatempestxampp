<?php 
	include("db.php");

	if (isset($_POST["Number"]) && !empty($_POST["Number"]) && 
		isset($_POST["password"]) && !empty($_POST["password"])){

		Login($_POST["Number"], $_POST["password"]);
	}

	function Login($Number, $Password){
		GLOBAL $con;

		$sql = "SELECT TeacherID FROM teacher WHERE Number=? AND Password=?";
		$st=$con->prepare($sql);

		$st->execute(array($Number, $Password));//encrypt password here
		$all=$st->fetchAll();
		if (count($all) == 1){
			echo "SERVER: Number".$all[0]["Number"];
			//echo "SERVER: ID#".$all[0]["id"]." - ".$all[0]["Number"];
			exit();
		}

		//if IdNumber or password are empty strings
		echo "SERVER: error, invalid Number or password";
		exit();
	}

	echo "SERVER: error";

	exit()//:  means end server connection (don't execute the rest)
?>