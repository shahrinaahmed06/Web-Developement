<?php
/*
   Author: Shahrina Ahmed 17999929
   Thios php file is getting the booking number and sending unassigned booking request. 
   if it is an unassigned request then assign the request to a driver.
*/

//php file used to compare booking numbers and set the booking to assigned.
$number = $_POST['BookingNumber'];
 // sql info or use include 'sqlinfo.inc'
 require_once('../../conf/sqlinfo.inc.php');
	
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


//checking  for booking number
$query = "SELECT * FROM cabsbooking WHERE BookingNumber = '$number'";
$search_Query = @mysqli_query($conn, $query);

$rows = @mysqli_num_rows($search_Query);

if ($rows > 0) {
    //checking which cab has been assigned
    $query = "SELECT * FROM cabsbooking WHERE BookingNumber = '$number' AND BookingStatus = 'assigned'";
    
    $search_Query = @mysqli_query($conn, $query);
    
    $rows = @mysqli_num_rows($search_Query);
    if ($rows > 0) {
        echo("A Driver has been  assigned to the booking already.");
    } else {
        // update bookingstatus to be assigned for that booking number
        $query = "UPDATE cabsbooking SET BookingStatus = 'assigned' WHERE BookingNumber = '$number'";
        $search_Query = @mysqli_query($conn, $query);

       echo("The booking number: $number has been assigned to a driver.");
    }
} else {
    echo("Invalid booking Number, please check again.");
}

}
?>