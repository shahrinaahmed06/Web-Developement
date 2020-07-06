<?php
 session_start(); 
 if (!isset ($_SESSION["rand_Num"])) { 
 $_SESSION["rand_Num"] = rand(1,100); 
 
$_SESSION["guesses"] = 0;
 }

?>

<html>
<head>
<title>Guessing Game</title>
</head>
<body>
	<h1><b>Guessing Game</b></h1>
	<form action="guessinggame.php", method = "post"><p>
		<p>Enter a number between 1 and 100.<br> 
		Then press the Guess button.</p>
		<input type="number" name="user_guess" id="user_guess" />
		<input type="submit" value="Guess" />
	</p>
	</form>
	<?php
		$user_guess = $_POST["user_guess"];
		if(isset($user_guess)){
			$guesses=$_SESSION["guesses"];
			$_SESSION['guesses']=$guesses++;
			$rand_Num = $_SESSION["rand_Num"]; 
			
			if($user_guess > $rand_Num )
			{
				echo "<p>Sorry! You could not guess the hidden number. It is higher number than the hidden number.</p>";
				$_SESSION["guesses"]++;
			}
			if($user_guess < $rand_Num){
				echo "<p>Sorry! You could not guess the hidden number. It is a lower number than the hidden number.</p>";
				$_SESSION["guesses"]++;
			}
			if($user_guess == $rand_Num){
				echo "<p>Congratulations! You guessed the hidden number.</p>";
			
			}
		
             
		}
		echo "<p>Number of guesses:", $_SESSION["guesses"], ".</p>";	
	?>
	<p><a href="giveup.php">Give Up</a><br/></p>
    <p><a href="startover.php">Start Over</a><br /></p>
</body>
</html>
