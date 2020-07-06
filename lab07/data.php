<!--file data.php -->
<?php
	// get name and password passed from client
	$name = $_POST['name'];
  $pwd = $_POST['pwd'];  	
  
  // sql info or use include 'file.inc'
  require_once('../../conf/setting.php');
	
  // The @ operator suppresses the display of any error messages
  // mysqli_connect returns false if connection failed, otherwise a connection value
  $conn = @mysqli_connect(
    $sql_host,
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
    $sql_table= "namePwd";

    // Set up the SQL command to add the data into the table
    $query = "select * from $sql_table WHERE name = '$name'";
    
    $result= mysqli_query($conn, $query)
		or die("unable to execute");
		
    $messageString = null;

    if($result -> num_rows > 0){
      while($row = $result -> fetch_assoc()) {
        if(strcmp($row["pwd"], $pwd) == 0){
          $messageString ="Request Email is " . $row["email"];
        }
        else if(strlen($pwd)==0){
          $messageString ="Please enter your password!";
        } 
        else{
          $messageString ="We found your name '$name' but your password is not match with our system!";
        }
      }
    }
    else if(strlen($name)==0){
      $messageString ="Please enter your username!";
    }
    else{
      $messageString ="There is no result for $name";
    }

    // Frees up the memory, after using the result pointer
    mysqli_free_result($result);
    // close the database connection
    mysqli_close($conn);
  }
	// sleep for 10 seconds to slow server response down
	sleep(10);
	// write back the password concatenated to end of the name
	ECHO ($messageString)
?>
