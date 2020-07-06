<?php
 session_start(); // start the session
 ($_SESSION["number"] = 0); // unset all session variables
 ($num = $_SESSION["number"]); // destroy all data associated with the session
 header("location:number.php"); // redirect to number.php 
?>