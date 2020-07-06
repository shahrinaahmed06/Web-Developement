<html>
  <head>
     <title>Leap year</title>
  </head>
  <body>
<h1>Leap year? - Lab 3</h1>
<?php
	$l = $_POST["year"];
	if(is_numeric($l)){
		if($l % 4 == 0){// divisible by 4 
			if($l % 100 == 0){
				if($l % 400 == 0){
					echo "<p>This value, ", $l, ", is a leap year.</p>";
				}
				else{
					echo "<p>This value, ", $l, ", is not a leap year.</p>";
				}
			}
			else{
				echo "<p>This value, ", $l, ", is a leap year.</p>";
			}
		}
		else{
			echo "<p>This value, ", $l, ", is not a leap year.</p>";
		}
	}
	else{
		echo "<p>This value, ", $l, ", is not a number.</p>";
	}
	
	
?>
</body>
</html>