<?php
/*
Author: Shahrina Ahmed (17999929)
Web Development -Assignment 2
This file get data from sql table where requests are unassigned 
and booking time is 2hours within current time.
*/
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
    echo "<p>DataBase Connection Failure!!.</p>";
} else {
    //getting the booking requests which are made after booked date and pickup time is within 2hours
    //from current time
    //increase time by 2hours to display all customers within that range.

    $date = $_POST['date'];

    date_default_timezone_set("Pacific/Auckland");

    $date = date('Y-m-d H:i:s');

    $futureDate = date("Y-m-d H:i:s", strtotime('+2 hours'));

    $query = "SELECT * FROM booking WHERE Pickup_Date BETWEEN '$date' AND '$futureDate' 
              AND Booking_Status='unassigned' 
              AND Pickup_Time BETWEEN '$date' AND '$futureDate'";

    $result = @mysqli_query($conn, $query);

    $booking_Count = @mysqli_num_rows($result);
    
    if ($booking_Count === 0) {
        $msg = "No matching results";
    } else {
        $msg = "<table class='table'>
                <thead>
                    <tr>
                        <th scope='col'>Booking Number
                        </th>
                        <th scope='col'>Customer Name
                        </th>
                        <th scope='col'>Contact Phone
                        </th>
                        <th scope='col'>Unit Number
                        </th>
                        <th scope='col'>Pick Up Address
                        </th>
                        <th scope='col'>Destination Subhurb
                        </th>
                        <th scope='col'>Pick Up Date
                        </th>
                        <th scope='col'>Pick Up Time
                        </th>
                    </tr>
                </thead>
                <tbody>";
    
        //fill out the table rows with associated results.
        while ($row = mysqli_fetch_array($result)) {
            $msg = $msg . "<tr>";
            for ($i = 0; $i < 8; $i++) {
                $msg = $msg . "<td>";
                $msg = $msg . "<p>" . $row[$i] . "</p>";
    
            }
            $msg = $msg . "</td>";
            $msg = $msg . "</tr>";
        }
        mysqli_free_result($result);
    
        mysqli_close($conn);
        $msg = $msg . "</tbody>
                       </table>";
    }
    echo $msg;
    
}
    
