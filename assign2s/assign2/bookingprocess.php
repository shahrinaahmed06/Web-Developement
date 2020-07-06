<?php
/*
Author: Shahrina Ahmed (17999929)
Web Development -Assignment 2
This file sending all the request data to booking table.
The file processing customer's booking and providing booking number to customer.
*/

// sql info  use include 'sqlinfo.inc'
require_once('../../conf/sqlinfo.inc.php');
    
// The @ operator suppresses the display of any error messages
// mysqli_connect returns false if connection failed, otherwise a connection value
$conn = @mysqli_connect($sql_host,
    $sql_user,
    $sql_pass,
    $sql_db
);
if (!$conn) {
    echo "<p>Database Connection Failure.</p>";
} else {
    // get name and customer details passed from customer

    

    $query = "SELECT * FROM booking";

    $result = mysqli_query($conn, $query);

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $unitNumber = $_POST['unitNumber'];

if ($unitNumber == "") {
    $unitNumber = "null";
}
    $street = $_POST['street'];
    $destination = $_POST['destination'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    

    $booking_count = mysqli_num_rows($result);//table row number assigned as booking number

    $booking_number = $booking_count + 1;

    $booking_DateTime = date('Y-m-d h:i:s');


    $sql_query = "INSERT INTO booking (Booking_Number, Customer_Name, Customer_Phone,  Unit_Number,Street_Address,              Destination_Suburb,Pickup_Date, Pickup_Time, Booking_Status, Booked_DateTime )
                                    VALUES('$booking_number', '$name', '$phone', '$unitNumber', '$street', '$destination',
                                           '$date', '$time', 'unassigned', '$booking_DateTime')";

if( mysqli_query($conn, $sql_query)){

// sleep for 2 seconds to slow server response down
//sleep(5);

echo ("Thank you! " . $name . ".Your booking reference  number  is  " . $booking_number . ".  You  will  be  picked  up  from  your  address  on  " . $date . "  at  " . $time. ".");
}
}
?>