<?php
 session_start(); // start the session
 if (!isset ($_SESSION["rand_Num"])) { 
 $_SESSION["rand_Num"] = rand(1,100); 
 }
?>

<html>
<head>
<title>Guessing Game</title>
</head>
<body>
	<h1><b>Guessing Game</b></h1>
	<?php
	$num = $_SESSION["rand_Num"];
		echo "The hidden number was  $num";
	?>
	<p><a href="startover.php">Start Over</a><br /></p>
</body>
</html>