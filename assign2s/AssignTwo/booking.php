<?php

// get name and password passed from client
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

// sql info or use include 'sqlinfo.inc'
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
    

    $query = "SELECT * FROM booking";

    $result = mysqli_query($conn, $query);
    

    $booking_count = mysqli_num_rows($result);

    $booking_number = $booking_count + 1;


    $storeSql = "INSERT INTO requests (BOOKING_NUMBER, CUSTOMER_NAME, "
    . "CUSTOMER_PHONE, UNIT_NUMBER,STREET_ADDRESS, DESTINATION_SUBURB, "
    . "PICKUP_DATE, PICKUP_TIME, STATUS, DATETIME_BOOKED) VALUES ('" . $booking_number . "', '" . $name . "', '" . $phone . "', "
    . $unitNumber . ", '" . $street . "', '" . $destination . "', '" . $date . "', '" . $time . "', 'unassigned', '" . $bookingDateTime . "')";

mysqli_query($conn, $storeSql);

// sleep for 5 seconds to slow server response down
sleep(5);
// write back the password concatenated to end of the name


echo ("Thank you! Your booking reference  number  is  " . $booking_number . ".  You  will  be  picked  up  in  front  of  your  provided address  at  " . $time . "  on  " . $date . ".");
}
?>