<?php 
	include_once("db.php");

	if (isset($_POST["SchoolID"]) && !empty($_POST["SchoolID"]) &&
		isset($_POST["OldGradeLvl"]) && !empty($_POST["OldGradeLvl"]) &&
		isset($_POST["NewGradeLvl"]) && !empty($_POST["NewGradeLvl"]) &&
		isset($_POST["TrNumber"]) && !empty($_POST["TrNumber"])){

		UpdateStud($_POST["SchoolID"], $_POST["OldGradeLvl"], $_POST["NewGradeLvl"], $_POST["TrNumber"]);
	}

	function UpdateStud($SchoolID, $OldGradeLvl, $NewGradeLvl, $TrNumber){
		GLOBAL $con;
		//$sql = "UPDATE student SET GradeLvl = '".$NewGradeLvl."', TrGameID = ".$TrGameID." WHERE SchoolID = ".$SchoolID." AND GradeLvl = '".$OldGradeLvl."";
		$sql = "UPDATE student SET GradeLvl = '".$NewGradeLvl."', TeacherID = (SELECT TeacherID FROM teacher WHERE Number = '".$TrNumber."') WHERE SchoolID = ".$SchoolID." AND GradeLvl = '".$OldGradeLvl."'";
		
		if($con->query($sql)==TRUE){
			echo "Updated successfully";
		}
		else{
			echo "Error: ".$sql."<br>".$con->error;
		}
	}
	
	//echo "SERVER: error";

	exit()//:  means end server connection (don't execute the rest)
?>