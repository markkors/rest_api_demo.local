<?php
// include autoload for loading classes
include_once("includes/autoloader.php");
$request = $_SERVER['REQUEST_URI'];
//var_dump($request);
//exit();
$url = parse_url($request);
//var_dump($url);
//exit();

$querystring = null;
if(isset($url["query"])) {
    $querystring = $url["query"];
}



// check if there is an id in the url
$parts = explode("/",$url['path']);
$id = null;
if(is_numeric($parts[2])) {
    $id = $parts[2];
}

// my router
switch ($parts[1]) {
    case '/':
        require __DIR__ . '/views/desc.php';
        break;
    case '':
        require __DIR__ . '/views/desc.php';
        break;
    case 'get' :
        require __DIR__ . '/api/get.php';
        break;
    case 'put':
        require __DIR__ . '/api/put.php';
        break;
    case 'delete':
        if($id == null) {
            http_response_code(404);
            require __DIR__ . '/views/404.php';
            break;
        } else {
            require __DIR__ . '/api/delete.php';
            break;
        }
    case 'patch':
        if($id == null) {
            http_response_code(404);
            require __DIR__ . '/views/404.php';
            break;
        } else {
            require __DIR__ . '/api/patch.php';
            break;
        }
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}
?>


