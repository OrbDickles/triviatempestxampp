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
        $count = $st->rowCount();
        $counter = 0;
        //$all=$st->fetch(PDO::FETCH_ASSOC);

        try
        {
            while ($all = $st->fetch(PDO::FETCH_ASSOC)) {
                //print_r($user); .count($all)
                

                if (++$counter == $count) {
                    echo $all['Answer']."|".$all['Description'];
                } else {
                    echo $all['Answer']."|".$all['Description']."#";
                }
            }
            //echo $count;
            // if(is_countable($all))
            // {
            //     // while()
            //     // {
            //     //     if (count($all) >= 1){

            //     //         echo $all['Answer']."|".$all['Description']."|".count($all);
            //     //         //exit();
            //     //     }
            //     // }   
            // }
            // else{
            //     echo "Word Not Found";
            // }
        }
        catch(Throwable $e){
            echo "Word Not Found";
        }
        exit();
    }
    exit()
?>