<?php
header("Content-Type: application/json");
require "DBConnection.php";
require "SendEmail.php";

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);


switch ($method) {
    case 'POST':
        handleGet($conn,$input);
        break;
}

function handleGet($conn,$input) {
    $sql = "SELECT `Passwd`,`Email` FROM tab_user where UserName='".$input['user']."'";
	file_put_contents("Log.txt", $sql);
	$result = $conn -> query($sql);

	if ($result -> num_rows > 0) {
		$row = $result -> fetch_assoc();
		if(password_verify($input['passwd'], $row["Passwd"])) {
			$random_number = random_int(100000, 999999);
			$sql = "UPDATE tab_user set LoginCode=".$random_number. " where UserName='".$input['user']."'";
			file_put_contents("Log.txt", $sql);
			$result = $conn -> query($sql);
			if(SendEmail($row["Email"],$random_number) == 0) {
				echo json_encode(['success' => 'Yes']);
			}
			else
				echo json_encode(['success' => 'No']);
		}
		else
			echo json_encode(['success' => 'No']);
	}
	else 
		echo json_encode(['success' => 'No']);
	
	$conn -> close();
}
?>