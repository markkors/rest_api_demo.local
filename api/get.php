<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$rm = $_SERVER['REQUEST_METHOD'];

if ($rm != 'GET') {
    http_response_code(405);
    echo json_encode(array("message" => "Request $rm method not allowed."));
    die();
}

//sleep(4);

$sql = new sql();
$p = new person();

$result = $sql->query("SELECT * FROM `gebruikers`");
http_response_code(200);
echo json_encode($result);