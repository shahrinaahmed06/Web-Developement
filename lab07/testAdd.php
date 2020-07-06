<?php
  require_once ("../../conf/setting.php");
  $conn = @mysqli_connect(
    $sql_host,
    $sql_user,
    $sql_pass,
    $sql_db
  );

  if(!$conn){
    die("Connection failed: " . mysql_connect_error());
  }

  $sqlString = "CREATE TABLE IF NOT EXISTS namePwd (
    name VARCHAR(50) NOT NULL UNIQUE,
    pwd VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    PRIMARY KEY (name) 
  )";
  $queryResult = @mysqli_query($conn, $sqlString) or
    die("Unable to execute the query." . mysqli_error($conn));

  if(isset ($_POST)){
    $name = $_POST["name"];
    $pwd = $_POST["password"];
    $email = $_POST["email"];

    $sql = "INSERT INTO namePwd (name, pwd, email)
    VALUES('$name', '$pwd', '$email')";

    if(mysqli_query($conn, $sql)){
        echo '<h2>Your record added successfully!</h2>';
    }
  }
?>