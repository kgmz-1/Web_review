<?php
$servername = "localhost";
$username = "sayaan";
$password = "sayaan";
$dbname = "WebRatingProj";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn -> connect_errno) {
  die("Connection failed: " . $conn -> connect_errno);
}
/*else { 
  die("Connection success: ");
  }*/
?>