<?php 
	include("db.php");
	//session_start();
    GetAnswer();
    
	function GetAnswer(){
        GLOBAL $con;

        $sql = "SELECT Answer FROM questions WHERE RoomID=?";
        $st=$con->prepare($sql);

        $st->execute();
        $all=$st->fetch(PDO::FETCH_ASSOC);

        try
        {
            if(is_countable($all))
            {
                if (count($all) == 1){

                    echo $all['Answer'];
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