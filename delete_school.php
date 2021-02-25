<?php 
	include_once("db.php");

	if (isset($_POST["SchoolID"]) && !empty($_POST["SchoolID"]) &&
		isset($_POST["Status"]) && !empty($_POST["Status"])){
		
		delSchool($_POST["SchoolID"], $_POST["Status"]);
	}

	function delSchool($SchoolID, $Status){
		$check = 2;
		if($check == $Status){
			$Status = 0;
		}
		
		GLOBAL $con;
		$sql = "UPDATE school sc, teacher tr, student st SET sc.Status = ".$Status.", tr.Status = ".$Status.", st.Status = ".$Status." WHERE sc.SchoolID = ".$SchoolID." AND sc.SchoolID = tr.SchoolID AND sc.SchoolID = st.SchoolID" ;
		if($con->query($sql)==TRUE){
			echo "School deactivated successfully";
		}
		else{
			echo "Error: ".$sql."<br>".$con->error;
		}
	}
	
	//echo "SERVER: error";

	exit()//:  means end server connection (don't execute the rest)
	
?>