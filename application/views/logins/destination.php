<?php var_dump($joins); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Destination</title>
</head>
<body>
	<a href="/index.php/logins/travel_dashboard">Home</a>
	<a href="/index.php/logins/logout">Logout</a>

	<h3><?php echo $destination['destination'] ?></h3>
	<p>Planned by: <?php  echo $destination['name']?></p>
	<p>Description: <?php  echo $destination['description']?></p>
	<p>Travel Date From: <?php  echo $destination['travel_date_from']?></p>
	<p>Travel Date From: <?php  echo $destination['travel_date_to']?></p>

	<h3>Others Joining the Trip:</h3>

			<?php 
				foreach($joins as $user)
				{
			?>
				<p><?php echo $user['name'] ?></p>
			<?php
				} 
			?>

</body>
</html>