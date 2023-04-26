<?php
// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "submitted_messages";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get message from POST data
$message = mysqli_real_escape_string($conn, $_POST["message"]);

// Insert message into database
$sql = "INSERT INTO messages (message) VALUES ('$message')";
if (mysqli_query($conn, $sql)) {
  echo "Message submitted successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
<?php
