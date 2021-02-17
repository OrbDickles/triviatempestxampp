<?php 

	include_once("db.php");

	if (isset($_POST["word"]) && !empty($_POST["word"])){

		SearchWord($_POST["word"]);
	}

	function SearchWord($word){
		GLOBAL $con;
		
		$sql = "SELECT meaning as def FROM oedict WHERE word=?";
		$st=$con->prepare($sql);

		$st->execute(array($word));
		$all=$st->fetch(PDO::FETCH_ASSOC);
		
		try
		{
			if(is_countable($all))
			{
				if (count($all) == 1){

					echo $all['def'];
					exit();
				}
			}
			else{
				echo "Word Not Found";
			}
		}
		catch(Throwable $e){
			echo "Word Not Found";
		}
		exit();
	}	
	exit() //:means end server connection (don't execute the rest)
?>
