<?php 
	include("db.php");

	if (isset($_POST["Username"]) && !empty($_POST["Username"]) && 
		isset($_POST["Password"]) && !empty($_POST["Password"])){

		Login($_POST["Username"], $_POST["Password"]);
	}

	function Login($username, $password){
		GLOBAL $con;

		$sql = "SELECT Username FROM admin WHERE Username=? AND Password=?";
		$st=$con->prepare($sql);

		$st->execute(array($username, $password));//encrypt password here
		$all=$st->fetchAll();
		if (count($all) == 1){
			echo "SERVER: Username".$all[0]["Username"];
			exit();
		}

		//if username or password are empty strings
		echo "SERVER: error, invalid username or password";
		exit();
	}

	echo "SERVER: error";

	exit()//:  means end server connection (don't execute the rest)
?>