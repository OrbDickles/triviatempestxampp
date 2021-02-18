<?php 
	include("db.php");
	//session_start();
    if (isset($_POST["SC"]) && !empty($_POST["SC"])){

		GetAnswer($_POST["SC"]);
	}
    
	function GetAnswer($SessionCode){
        GLOBAL $con;
        
        $sql = "SELECT * FROM questions WHERE RoomID=?";
        $st=$con->prepare($sql);

        $st->execute(array($SessionCode));
        $all=$st->fetch(PDO::FETCH_ASSOC);

        try
        {
            if(is_countable($all))
            {
                if (count($all) >= 1){

                    echo $all['Answer']."|".$all['Description'];
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
    exit()
?>