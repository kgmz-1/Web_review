<?php
header("Content-Type: application/json");
require "DBConnection.php";

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'POST':
        handleGet($conn, $input);
        break;
}

function handleGet($conn, $input) {
    $rows = array();
    $sql = "SELECT rating,comment from tab_rating where filmname='".$input['filmname']."' and username='".$input['user']."'";
    file_put_contents("Log.txt", $sql);
    $result = $conn -> query($sql);
    if ($result -> num_rows > 0) {
        while ($row = $result -> fetch_assoc())
            $rows[] = $row;

            $conn -> close();
            print json_encode($rows);
	}
    else
    {
        $conn -> close();
        echo json_encode(['success' => 'No']);        
    }
}

?>