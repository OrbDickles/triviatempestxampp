<?php 
	include_once("db.php");

	if (isset($_POST["SchoolID"]) && !empty($_POST["SchoolID"]) &&
		isset($_POST["Number"]) && !empty($_POST["Number"]) &&
		isset($_POST["Status"]) && !empty($_POST["Status"])){

		UpdTeacherStatus($_POST["SchoolID"], $_POST["Number"], $_POST["Status"]);
	}

	function UpdTeacherStatus($SchoolID, $Number, $Status){
		GLOBAL $con;
		$check = 2;
		
		if($check == $Status){
			$Status = 0;
		}
		
		$sql = "UPDATE teacher SET Status = ".$Status." WHERE SchoolID = ".$SchoolID." AND Number = '".$Number."'";
		
		if($con->query($sql)==TRUE){
			echo "Updated successfully";
		}else{
			echo "Error: ".$sql."<br>".$con->error;
		}
	}
	
	//echo "SERVER: error";

	exit()//:  means end server connection (don't execute the rest)
?>