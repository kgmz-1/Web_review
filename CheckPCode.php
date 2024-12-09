<?php
header("Content-Type: application/json");
require "DBConnection.php";

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'POST':
        handleGet($conn,$input);
        break;
}

function handleGet($conn,$input) {
    $sql = "SELECT `LoginCode` FROM tab_user where UserName='".$input['user']."' and LoginCode=".$input['pcode'];
	file_put_contents("Log.txt", $sql);
	$result = $conn -> query($sql);

	if ($result -> num_rows > 0) {
		echo json_encode(['success' => 'Yes']);
	}
	else 
		echo json_encode(['success' => 'No']);
	
	$result -> free_result();
	$conn -> close();
}
?>