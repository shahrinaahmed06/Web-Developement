<?php
/*
    Shahrina Ahmed 17999929
    displayed requested un-assigned bookings.
*/

//increase time by 2hours to display all customers within that range.
$date = $_POST['date'];
date_default_timezone_set("Pacific/Auckland");

$date = date('Y-m-d H:i:s');
$upComingDate = date("Y-m-d H:i:s", strtotime('+2 hours'));//shows booking withing 2hours

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
    echo "<p>Database Connection Failure!!</p>";
} else {
    //upon successful connection

$unassignQuery = "SELECT *FROM cabsbooking WHERE BookingStatus = 'unassigned' AND PickupDateTime BETWEEN '$date' AND '$upComingDate'";

$result = @mysqli_query($conn, $unassignQuery);

$unassign_rows = @mysqli_num_rows($result);

//create and display a table based on the query
if ($unassign_rows === 0) {
    $request_msg = "There is no such requests!!";
} else {
    $request_msg = "<table class='table'>
            
    <thead>
				<tr>
					<th scope='col'>Booking Number
					</th>
					<th scope='col'>Customer Name
					</th>
					<th scope='col'>Customer Phone
					</th>
					<th scope='col'>Pick Up Address
					</th>
					<th scope='col'>Destination suburb
					</th>
					<th scope='col'>Pick Up Date & Time
					</th>
				</tr>
	</thead>
			<tbody>";

    
    
            while ($unassign_rows = mysqli_fetch_array($result)) {
       
                $request_msg = $request_msg . "<tr>";
        
                for ($i = 0; $i < 6; $i++) {
           
                    $request_msg = $request_msg . "<td>";
                    $request_msg = $request_msg . "<p>" . $unassign_rows[$i] . "</p>";

        }
        $request_msg = $request_msg . "</td>";
        $request_msg = $request_msg . "</tr>";
    }
    mysqli_free_result($result);

    mysqli_close($conn);
    $request_msg = $request_msg . "</tbody>
		           </table>";
}
echo $request_msg;
}
?>