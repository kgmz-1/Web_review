<?php
require "DBConnection.php";

if(!isset($_GET["user"]) || !isset($_GET["passwd"]))	
	die();

$user = htmlspecialchars($_GET["user"]); 
$passwd = htmlspecialchars($_GET["passwd"]);
$posts = array();

$sql = "SELECT * FROM tab_user where UserName='".$user."' and passwd='".$passwd."'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	
  // output data of each row
  /*while($row = mysqli_fetch_assoc($result)) {
	$posts[] = $row;
  }*/
  echo json_encode(['message' => 'Yes']);
} else {
  echo json_encode(['message' => 'No']);
}

mysqli_close($conn);
/*if(!empty($posts))
{
	header('Content-type: application/json');
	echo json_encode($posts,JSON_PRETTY_PRINT);
}*/
?>