<?php
header("Content-Type: application/json");
require "DBConnection.php";

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'POST':
        handlePost($conn, $input);
        break;
}


function handlePost($conn, $input) {
    $sql = "INSERT INTO tab_rating (FilmName, Rating, Comment,ImgSrc) VALUES ('".$input['filmname']."','".$input['rating']."','".$input['Comment']."','terminator.png')";
    if ($conn -> query($sql)) {
		echo json_encode(['message' => 'Success']);
	} else {
		echo json_encode(['message' => 'Failed']);
	}
	$conn -> close();
}

?>