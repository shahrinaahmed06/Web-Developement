<?php

// sql info or use include 'sqlinfo.inc'
require_once('../../conf/sqlinfo.inc.php');
	
// The @ operator suppresses the display of any error messages
// mysqli_connect returns false if connection failed, otherwise a connection value
$conn = @mysqli_connect($sql_host,
    $sql_user,
    $sql_pass,
    $sql_db
);

$booking_number = $_POST['booking_number'];

if (!$conn) {
    echo "<p>Database Connection Failure!!</p>";
} else {
    //upon successful connection
    $query = "UPDATE booking SET 'Booking_Status' = 'assigned' WHERE Booking_Number = " . $booking_number;

    $result = mysqli_query($conn, $query);
    if(!$result)
    {
        echo "Something Wrong with query";

    }else{
    
         echo "The booking request " . $booking_number . "by customer has been properly assigned.";
    }
}