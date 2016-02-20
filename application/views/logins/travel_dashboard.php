
<!DOCTYPE html>
<html>
<head>
	<title>Travel Dashboard</title>
</head>
<body>
	<h3>Welcome, <?php echo $this->session->userdata('user')['name'] ?></h3>
	<a href="/index.php/logins/logout">Log Out</a>

	<h4>Your Trip Schedule</h4>
	<table>
		<thead>
			<tr>
				<td>Destination</td>
				<td>Travel Start Date<td>
				<td>Travel End Date<td>
				<td>Description<td>
			</tr>
		</thead>
		<tbody>
			<?php 
				foreach($user_trips as $user_trip)
				{
			?>
					<tr>
						<td><?php echo $user_trip['destination'] ?></td>
						<td><?php echo $user_trip['travel_date_from'] ?></td>
						<td><?php echo $user_trip['travel_date_to'] ?></td>
						<td><?php echo $user_trip['description'] ?></td>
					</tr>
			<?php	
				} 
			?>
		</tbody>
	</table>

	<h4>Other User's Travel Plans</h4>
	<table>
		<thead>
			<tr>
				<td>Name</td>
				<td>Destination</td>
				<td>Travel Start Date<td>
				<td>Travel End Date<td>
				<td>Do You want to join<td>
			</tr>
		</thead>
		<tbody>
			<?php 
				foreach($nonuser_trips as $user_trip)
				{
			?>
					<tr>
						<td><?php echo $user_trip['name'] ?></td>
						<td><a href="/index.php/trips/view_destination/<?php echo $user_trip['id'] ?>"><?php echo $user_trip['destination'] ?></a></td>
						<td><?php echo $user_trip['travel_date_from'] ?></td>
						<td><?php echo $user_trip['travel_date_to'] ?></td>
						<td><a href="/index.php/trips/join_user/<?php echo $user_trip['id'] ?>">Join</a></td>
					</tr>
			<?php	
				} 
			?>
		</tbody>
	</table>

	<a href="/index.php/trips/add_trip_location">Add</a>
</body>
</html>