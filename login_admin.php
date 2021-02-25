<?php 
	include_once("db.php");

	if (isset($_POST["username"]) && !empty($_POST["username"]) && 
		isset($_POST["password"]) && !empty($_POST["password"])){

		Login($_POST["username"], $_POST["password"]);
	}

	function Login($username, $password){
		GLOBAL $con;

		$sql = "SELECT username FROM admin WHERE username=? AND password=?";
		$st=$con->prepare($sql);

		$st->execute(array($username, $password));//encrypt password here
		$all=$st->fetchAll();
		if (count($all) == 1){
			echo "SERVER: Username".$all[0]["username"];
			//echo "SERVER: ID#".$all[0]["id"]." - ".$all[0]["username"];
			exit();
		}

		//if username or password are empty strings
		echo "SERVER: error, invalid username or password";
		exit();
	}

	echo "SERVER: error";

	exit()//:  means end server connection (don't execute the rest)
?>