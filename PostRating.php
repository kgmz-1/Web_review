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
    $sql = "SELECT rating,comment from tab_rating where filmname='".$input['filmname']."' and username='".$input['user']."'";
    file_put_contents("Log.txt", $sql);
    $result = $conn -> query($sql);
    if ($result -> num_rows > 0) {
        $sql = "UPDATE tab_rating SET rating='".$input['rating']."' , comment='".$input['Comment']."' WHERE filmname='".$input['filmname']."' and username='".$input['user']."'";
        if ($conn -> query($sql)) {
            $conn -> close();
            echo json_encode(['message' => 'Success']);
        } else {
            $conn -> close();
            echo json_encode(['message' => 'Failed']);
        }
    }
    else {
        $sql = "INSERT INTO tab_rating (FilmName,UserName, Rating, Comment,ImgSrc) VALUES ('".$input['filmname']."','".$input['user']."','".$input['rating']."','".$input['Comment']."','terminator.png')";
        if ($conn -> query($sql)) {
            $conn -> close();
            echo json_encode(['message' => 'Success']);
        } else {
            $conn -> close();
            echo json_encode(['message' => 'Failed']);
        }
    }
}

?>