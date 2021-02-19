<?php 
	include_once("db.php");
	session_start();
	if (isset($_POST["RoomID"]) && !empty($_POST["RoomID"])){

		SearchRoom($_POST["RoomID"]);
	}

	function SearchRoom($RoomID)
    {
		GLOBAL $con;
		
		$sql = "SELECT RoomID FROM room WHERE RoomID=?";
		$st=$con->prepare($sql);

		$st->execute(array($RoomID));
		$all=$st->fetch(PDO::FETCH_ASSOC);
		
		try
		{
			if(is_countable($all))
			{
				if (count($all) == 1){

					echo $all['RoomID'];
					exit();
				}
			}
			else{
				echo "SERVER: error, Room Not Found!";
			}
		}
		catch(Throwable $e){
			echo "SERVER: error, Room Not Found!";
		}
		exit();
	}	
	exit() //:means end server connection (don't execute the rest)
?>
