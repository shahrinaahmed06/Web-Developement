<?php
// sql info or use include 'file.inc'
require_once('../../conf/sqlinfo.inc.php');
	
// The @ operator suppresses the display of any error messages
// mysqli_connect returns false if connection failed, otherwise a connection value
$conn = @mysqli_connect($sql_host,
    $sql_user,
    $sql_pass,
    $sql_db
);


if (!$conn) {
    echo "<p>Connection not made. Killing script.</p>";
} else {
    $query = "SELECT * FROM requests WHERE PICKUP_DATE=CURRENT_DATE AND STATUS='unassigned' AND PICKUP_TIME > SUBDATE(NOW(), INTERVAL 2 HOUR)";

    $result = mysqli_query($conn, $query);

    $requestCount = mysqli_num_rows($result);
    
    $requestsArray = Array();
    
    while ($r = mysqli_fetch_assoc($result))
    {
        $requestsArray[]=$r;
    }
    
    echo json_encode($requestsArray);
}
    
// sleep for 5 seconds to slow server response down
  
