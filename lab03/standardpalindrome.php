<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Using string functions</title>
</head>
<body>
<h1>Web Development – Lab 3</h1>
<?php
if (isset ($_POST["string"])){
$str = $_POST["string"];
$reverse="";
if(!is_numeric($str)){
	$str=preg_replace("/[^A-Za-z]/",'',$str);
	$reverse=strrev($str);
	if($str == $reverse){
		echo "<p>It is a standard palindrome</p>";
	}else{
		echo "<p>It is not a standard palindrome</p>";
	}
}
}
?>
</body>
</html>