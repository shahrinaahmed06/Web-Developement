<?php

/*
   Author: Shahrina Ahmed (17999929)
Web Development -Assignment 2
This file sending all the request data to cabsbooking table.
The file processing customer's booking request and providing booking number to customer.
To create a unique booking number for each customer the file have function which will generate unique booking
code.
*/

//receive and set variables from the form data. Using POST Method

$name = $_POST['name'];
$phone = $_POST['phone'];
$unit = $_POST['unit'];
$streetNumber = $_POST['streetNumber'];
$streetName = $_POST['streetName'];
$destination = $_POST['destination'];
$date = $_POST['date'];
$time = $_POST['time'];



$booking_msg = "";
$count = 0;

//$booking_msg = "unit:" . $unit . "<br>";

function random_code()//for generating random booking number.
{
    $booking_code = time();
   
    return (rand(0000, 5000));
}

//name validation for alphabetic format 
if (empty($name) || !preg_match('/[a-zA-Z]/', $name) || strlen($name) > 40) {
    $booking_msg = $booking_msg . "Your Name is InValid. <br>";
    $count++;

}

//phone validation for numbers only
if (empty($phone) || !preg_match('/[0-9]/', $phone) || strlen($phone) < 7) {
    $booking_msg = $booking_msg . "Your Phone number is Invalid <br>";
    $count++;

}

//validation for unit number 
/*if (!preg_match('/[0-9]/', $unit)) {
    $booking_msg = $booking_msg . "Unit number is Invalid <br>";
    $count++;

}*/
//validation for street number 
if (empty($streetNumber) || !preg_match('/[0-9]/', $streetNumber) || strlen($streetNumber) > 10) {
    $booking_msg = $booking_msg . "Street number is Invalid <br>";
    $count++;

}


//validation for steet name
if (empty($streetName) || !preg_match('/[a-zA-Z]/', $streetName) || strlen($streetName) > 50) {
    $booking_msg = $booking_msg . "Street Name is Invalid <br>";
    $count++;

}

//validate destination does not contain numbers
if (empty($destination) || !preg_match('/[a-zA-Z]/', $destination) || strlen($destination) > 40) {
    $booking_msg = $booking_msg . "Destination suburb is Invalid <br>";
    $count++;
}

//date and time will be validate if its only after curent date and time

date_default_timezone_set("Pacific/Auckland");//time zone for local time
$dateTimeField = strtotime($date . " " . $time);//concatibate pickup date and time

$pickupDateTime = date('Y-m-d H:i', $dateTimeField);
$bookedDateTime = date('Y-m-d H:i');//The time of booking request

if (empty($date) || empty($time) || !preg_match('/:[0-9]/', $time) || !preg_match('/-[0-9]/', $date) || $pickupDateTime < $bookedDateTime) {
    
    $booking_msg = $booking_msg . "Requested pickup time and date are incorrect <br>";
    $count++;
}

// generate booking number, create pickup address, check unique booking number and insert into table the details, then close and set$booking_msg.
//$booking_msg will be empty if no errors in the validation!
if ($count === 0) {
   // sql info  use include 'sqlinfo.inc'
require_once('../../conf/sqlinfo.inc.php');
    
// The @ operator suppresses the display of any$booking_msg messages
// mysqli_connect returns false if connection failed, otherwise a connection value
$conn = @mysqli_connect($sql_host,
    $sql_user,
    $sql_pass,
    $sql_db
);
if (!$conn) {
    echo "<p>Database Connection Failure.</p>";
} else {
//upon successfull connection
    $booking_msg = $booking_msg . "In if";

    $bookingNumber = random_code();
   
    $pickupAddress = $streetNumber . " " . $streetName;//concatinate street Number and street Address
  
    $bookingQuery = "SELECT * FROM cabsbooking WHERE BookingNumber = '$bookingNumber'";

    $query = @mysqli_query($conn, $bookingQuery) ;
    if(!$query)

    {
        echo("Something wrong wity query");
    }
    else{

    $table_rows = @mysqli_num_rows($query);
    // Check if booking Number Exists
    if (!empty($table_rows)) {
        $bookingNumber = random_code();
    }
}

    $booking_msg = $booking_msg . "In if2";

    $sql_insert = "INSERT INTO cabsbooking(BookingNumber, CustomerName, CustomerPhone, CustomerAddress, PickupDateTime, Destination, BookingDateTime, BookingStatus) 
                                   VALUES ('$bookingNumber', '$name', '$phone', '$pickupAddress', '$pickupDateTime', '$destination', '$bookedDateTime', 'unassigned')";

$query = @mysqli_query($conn, $sql_insert);
if($query){
mysqli_close($conn);
$booking_msg = "Thank you! $name <br> Your cab booking number is $bookingNumber <br> You will be picked up from $pickupAddress <br>
at $time on $date <br>";
    
}
    
}
}
echo $booking_msg;


?>