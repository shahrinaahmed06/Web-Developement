<?php
/* Daniel English - 14850842
	updateBooking.php is the data transfer which changes a booking from unassigned to assigned */
	// get name and password passed from client
	 $bookReff = $_POST['bookRef'];
	
	require_once("../../conf/settings.php"); //please make sure the path is correct
	$conn = @mysqli_connect( $sql_host,
	$sql_user,
	$sql_pass,
	$sql_db);

 	if(!$conn){
		$toReturn = "DB connection failure";
	} else {
              $sql_query = "UPDATE `cab_booking` SET `status` = \"assigned\" WHERE `bookingRefNo` = \"$bookReff\"";
              
              $result = mysqli_query($conn, $sql_query);
				 
		if($result === TRUE){
			echo json_encode($bookReff. " booking request, has been properly assigned.");
		} else {
			echo json_encode("something happened" . mysqli_error($conn). $bookReff);
		}
		$conn -> close();
  }
?>