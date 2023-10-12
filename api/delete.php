<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$rm = $_SERVER['REQUEST_METHOD'];

if ($rm != 'DELETE') {
    http_response_code(405);
    echo json_encode(array("message" => "Request $rm method not allowed."));
    die();
}

global $id;
echo "<br>Delete API here";
echo "<br>Delete record $id";