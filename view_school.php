<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "triviadb";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT SchoolID, SchoolName FROM school";
	$result = $conn->query($sql);
	

	if ($result->num_rows > 0) {	
		// output data of each row
		while($row = $result->fetch_assoc()) {		
			echo "".$row["SchoolID"]."|".$row["SchoolName"].";";
		}
		
	} else {
	  echo "0 results";
	}
	$conn->close();
  
?>