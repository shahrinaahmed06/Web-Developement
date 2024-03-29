<?php
$booking_id = $_POST['booking_id'];
// Retrieve credentials
require_once("../../conf/sqlinfo.inc.php");
// Create mysqli object and connect
$conn = new mysqli($sql_host, 
                   $sql_user, 
                   $sql_pass, 
                   $sql_db);
if ($conn->connect_error) {
    echo "Error connecting to the database. Error number: " . $conn->connect_errno;
    die();
}

$sql = "UPDATE booking
        SET status = 'Assigned'
        WHERE Booking_ID = $booking_id;"; // Prepare query
// Query database and check if successful
if ($conn->query($sql) === true && $conn->affected_rows > 0) {
    echo "<h4 style='color:green;'>Taxi successfully assigned</h4>";
} else {
    echo "<h4 style='color:red;'>Error assigning taxi for booking reference number $booking_id. 
    The booking number may not exist in the database or the taxi you are trying to assign is already assigned to another booking</h4>";
}

?>