<?php
header("Content-Type: application/json");
require "DBConnection.php";
require "SendEmail.php";

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'POST':
        handlePost($conn, $input);
        break;
}

function handlePost($conn, $input) {
    $passwd = password_hash($input['passwd'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO tab_user (UserName, Passwd,FName,LName,Email,Addr) VALUES ('".$input['username']."','".$passwd."','".$input['fname']."','".$input['lname']."','".$input['email']."','".$input['addr']."')";
    file_put_contents("Log.txt", $sql);
    if ($conn -> query($sql)) {

        /*$text = "Please click http://localhost/WebRating/VerifyEmail.php?id=".urlencode($input['email'])." to verify your email.";
        if(SendEmail($row["Email"],$text) == 0) {
            echo json_encode(['message' => 'Success']);
        }
        else
            echo json_encode(['message' => 'Failed']);
        */
		echo json_encode(['message' => 'Success']);
	} else {
		echo json_encode(['message' => 'Failed']);
	}
	$conn -> close();
}

?>