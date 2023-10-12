<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$rm = $_SERVER['REQUEST_METHOD'];

if ($rm != 'PUT') {
    http_response_code(405);
    echo json_encode(array("message" => "Request $rm method not allowed."));
    die();
}

// read the input
$data = json_decode(file_get_contents("php://input"));


$sql = new sql();
sleep(3);

$result = $sql->query("INSERT INTO `gebruikers` (`voornaam`,`achternaam`,`email`,`geboortedatum`) VALUES (?,?,?,?)",[$data->firstname, $data->lastname, $data->email, $data->birth]);
echo json_encode($result);

