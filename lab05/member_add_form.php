<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" >
<head>
<title>Week 05 Lab</title>
</head>

<body>
	<h1>Creating the member add form</h1>
	<form method="post" action="member_add.php">
		<p>	<label for="member_id">Enter member ID: </label>
			<input type="number" name="id" id="id" /></p>
		<p>	<label for="fname">Enter first name: </label>
			<input type="text" name="fname" id="fname" /></p>
		<p>	<label for="lname">Enter last name: </label>
			<input type="text" name="lname" id="lname" /></p>
		<p>	<label for="gender">Enter Gender: </label>
			<input type="text" name="gender" id="gender" /></p>
		<p>	<label for="email">Enter Email: </label>
			<input type="text" name="email" id="email" /></p>
		<p>	<label for="phone">Enter Phone: </label>
			<input type="text" name="phone" id="phone" /></p>
        <p>	<input type="submit" value="Add Item" /></p>
	</form>
</body>
</html>