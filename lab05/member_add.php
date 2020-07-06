<html>
<head>
<title>MySQL Databases with and PHP</title>
</head>

<body>
<?php
	// sql info or use include 'file.inc'
       require_once('../../conf/setting.php');
	
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
		$member_id    = $_POST["member_id"];
        $fname	      = $_POST["fname"];
		$lname	      = $_POST["lname"];
		$gender	      = $_POST["gender"];
		$email        = $_POST["email"];
		$phone        = $_POST["phone"];
		

		// Set up the SQL command to add the data into the table
		$query = "insert into vipmember"
						."(member_id, fname, lname, gender, email, phone)"
					. "values"
						."('$member_id','$fname','$lname', '$gender', '$email', '$phone')";
echo $query;
		// executes the query
		$result = mysqli_query($conn, $query);
		// checks if the execution was successful
		if(!$result) {
			echo "<p>Something is wrong with ",	$query, "</p>";
		} else {
			// display an operation successful message
			echo "<p>Success</p>";
		} // if successful query operation

		// close the database connection
		mysqli_close($conn);
	}  // if successful database connection
?>
</body>
<html>




