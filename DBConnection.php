<?php
$servername = "localhost";
$username = "sayaan";
$password = "sayaan";
$dbname = "WebRatingProj";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>