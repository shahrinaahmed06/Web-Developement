<html>
<head>
<title>MySQL Databases with and PHP</title>
</head>

<body>
<?php
     
	// sql info or use include 'file.inc'
       require_once('../../conf/sqlinfo.inc.php');
	
	// The @ operator suppresses the display of any error messages
	// mysqli_connect returns false if connection failed, otherwise a connection value
	$conn = @mysqli_connect($sql_host,
		$sql_user,
		$sql_pass,
		$sql_db
	);
  
	// Checks if connection is successful
	if (!$conn) {
		// Displays an error message
		echo "<p>Database connection failure</p>";
	} else {
		// Upon successful connection
		
		// Get data from the form
		$status_code            = $_POST["status_code"];
		$statuscode_pattern     = "/^S\d{4}$/";
        $status	                = trim($_POST["status"]);
		$status_pattern         = "/^[A-Za-z0-9 ,.!?]+$/";
		$share	                = $_POST["share"];
		$Date	                = trim($_POST["Date"]);
		//$date_pattern = "/^\d{2}\/\d{2}\/\d{4}$/";//dd/mm/yyyy
		$permission_type        = $_POST["permission_type"];
		
		$isCorrect = true;//process the result for illegal input
		
		
		// Set up the SQL command to add the data into the table
		
		
		if(!$status_code || !preg_match($statuscode_pattern,$status_code)){ // illegal status code
		$isCorrect = false;
		echo "<p>Status code is not valid</p>";
	}
	
	if(!preg_match($status_pattern,$status)){ // illegal status
		
		$isCorrect = false;
		echo "<p>illegal status</p>";
	}
	/*if(!preg_match($date_pattern,$Date)){// date pattern is not correct
		
		$isCorrect = false;
		echo "<p>Date format is not correct</p>";
	}*/
	if($isCorrect)//executes if all inputs are correct
	{
		$query = "insert into diary"
						."(status_code, status, share, Date, permission_type)"
					. "values"
						."('$status_code','$status','$share', '$Date', '$permission_type')";
        echo $query;
		
		$result = mysqli_query($conn, $query);
		// executes the query

		if(!$result) {
			echo "<p>Something is wrong with ",	$query, "</p>";
			
		} else {
			// display an operation successful message
			echo "<p>Successfull.</p>";
			
		} // if successful query operation
		
		
	}
		

	}
		// close the database connection
		mysqli_close($conn);
	  // if successful database connection
?>
      <p><a href = "index.html">Return to Home Page</a></p>
</body>
</html>