<!DOCTYPE html>
<html>
<head>
	<title>View Submitted Messages</title>
</head>
<body>
	<?php
		// check if password is set and correct
		$password = isset($_POST['password']) ? $_POST['password'] : '';
		if ($password !== 'sr022') {
			echo '<form method="post" action="">
					<label for="password">Enter Password:</label>
					<input type="password" name="password" id="password">
					<button type="submit">Submit</button>
				</form>';
			exit();
		}
	?>

	<h1>Submitted Messages:</h1>

	<table>
		<tr>
			<th>ID</th>
			<th>Message</th>
		</tr>

		<?php
			// Connect to the database
			$mysqli = new mysqli("sql211.epizy.com", "epiz_34083507", "3cqwmxz0", "epiz_34083507_messages");

			// Check connection
			if ($mysqli->connect_errno) {
			  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
			  exit();
			}

			// Query to retrieve data from the table
			$sql = "SELECT id, message FROM messages";

			// Execute the query
			$result = $mysqli->query($sql);

			// Check for errors
			if (!$result) {
			  echo "Failed to retrieve data: (" . $mysqli->errno . ") " . $mysqli->error;
			  exit();
			}

			// Loop through the data and output it in the table
			while ($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row["id"] . "</td>";
				echo "<td>" . $row["message"] . "</td>";
				echo "</tr>";
			}

			// Close the connection
			$mysqli->close();
		?>
	</table>

	<button onclick="location.href='index.html';">Go back!</button>
</body>
</html>
