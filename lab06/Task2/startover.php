<?php
      session_start(); // start the session
      $_SESSION = array();
      session_destroy(); 
	   header("location:guessinggame.php");

	   ?>