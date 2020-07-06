<html>
<head>
	<title>Status Posting System</title>
</head>
<body>
	<h1 style="background-color:DodgerBlue;">Post Status Page</h1>
	<form action = "poststatusprocess.php" method = "post">

		<p>	<label for="status_code">Status code (required): </label>
			<input type="text" name="status_code" id="status_code" /></p>
		<p>	<label for="status">Status (required): </label>
			<input type="text" name="status" id="status" /></p>
		<p> <label>Share: </label> 
			<input type = "radio" name = "share" id = "share" value = "public">
			<label for = "public">Public </label>
			<input type = "radio" name = "share" id = "share" value = "friends">
			<label for = "friends">Friends </label>
			<input type = "radio" name = "share" id = "share" value = "only_me">
			<label for = "only_me">Only Me </label></p>
		<p> <label>Date: </label>
			<input type = "date" name = "Date" id = "Date" placeholder = "dd/mm/yyyy" required</p>
		<p> <label>Permission Type: </label> 
			<input type = "checkbox" name = "permission_type" id = "permission_type" value = "like">
			<label for = "like"> Allow Like </label>
			<input type = "checkbox" name = "permission_type" id = "permission_type" value = "comments">
			<label for = "comment"> Allow Comments </label>
			<input type = "checkbox" name = "permission_type" id = "permission_type" value = "share">
			<label for = "share"> Allow share </label></p>
		<p> <input type = "submit" value = "POST" />
			<input type = "reset" value = "RESET" /></p> 
		<p><a href = "index.html">Return to Home Page</a> 
		<br/></p>
        
	</form>
</body>
</html>