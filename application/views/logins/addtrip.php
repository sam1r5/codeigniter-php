<!DOCTYPE html>
<html>
<head>
	<title>Add Plan</title>
</head>
<body>
	<a href="/index.php/logins/travel_dashboard">Home</a>
	<a href="/index.php/logins/logout">Logout</a>
	<?php
		if($this->session->flashdata())
		{
			echo $this->session->flashdata('errors');
		} 
	 ?>
	<form action="/index.php/trips/add_trip" method="post">
		<label>Destination:<input type='text' name='destination'></label>
		<label>Description<input type='text' name='description'></label>
		<label>Travel Date From<input type='text' name='travel_date_from'></label>
		<label>Travel Date to<input type='text' name='travel_date_to'></label>
		<input type="submit" name='action' value='add'>
	</form>
</body>
</html>