<?php
/*
    Shahrina Ahmed
    db.php
    Establish connection and create table if it does not exist.
*/

// select the cabsOnline table and establish connection
require_once('../../conf/sqlinfo.inc.php');
    
// The @ operator suppresses the display of any error messages
// mysqli_connect returns false if connection failed, otherwise a connection value
$conn = @mysqli_connect($sql_host,
    $sql_user,
    $sql_pass,
    $sql_db
);

$db_selected = mysqli_select_db($conn, "Shahrina");

// Create the cabsOnline table if it does not exist
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS booking
	(
		Booking_Number INT NOT NULL,
		CustomerName VARCHAR(25) NOT NULL,
		Customer_Phone VARCHAR(14) NOT NULL,
		Customer_Address VARCHAR(255) NOT NULL,
		PickupDate DateTime NOT NULL,
		Destination_Suburb VARCHAR(40) NOT NULL,
		Booking_Date DateTime NOT NULL,
		Booking_Status VARCHAR(25) NOT NULL,
		PRIMARY KEY(Booking_Number)
	)";
echo mysqli_error($conn) . "<br>";
mysqli_query($conn, $sqlCreateTable);
?>