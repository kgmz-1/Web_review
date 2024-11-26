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
    $sql = "SELECT `Passwd` FROM tab_user where UserName='".$input['user']."'";
	file_put_contents("Log.txt", $sql);
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		if(password_verify($input['passwd'], $row["Passwd"]))
	  		echo json_encode(['success' => 'Yes']);
		else
			echo json_encode(['success' => 'No']);
	} else {
	  echo json_encode(['success' => 'No']);
	}

	mysqli_close($conn);
}

?>