<html>
  <head>
     <title>Factorial</title>
  </head>
  <body>
<h1>Factorial - Lab 3</h1>
<?php 
	include 'mathfunctions.php';
	$num = $_POST["number"];
	echo "<p> Factorial of the given value ", $num, " is: ", factorial($num), "</p>";
	
?>
</body>
</html>
