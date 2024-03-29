<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$pickup = $_POST['pickup'];
$dest = $_POST['dest'];
$date = $_POST['date'];
$time = $_POST['time'];
$date_booked = date("Y-m-d");
// Get the credentials
require_once("../../conf/sqlinfo.inc.php");

$conn = new mysqli($sql_host, 
                   $sql_user, 
				   $sql_pass, 
				   $sql_db);
if ($conn->connect_error) {
    echo "Error connecting to the database. Error number: " . $conn->connect_errno;
    die();
}
// Write INSERT query
$sql = "INSERT INTO booking('Name', 'Phone', 'PickUp_Address', 'Dest_Suburb', 'PickUp_Date', 'Date_Booked') 
VALUES ('$name',$phone,'$pickup','$dest','$date','$date_booked')";
// Query the databse
$result = $conn->query($sql);
if ($result->error_get_last) {
    echo "<p style='color:red;'>Error booking. "+ $result->error_get_last + "</p>";
} else {
    echo "<p style='color:green;'>Booking submitted</p>";
}
// Close the connection
$conn->close();
?>