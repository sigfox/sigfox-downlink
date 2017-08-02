<?php
header('Content-Type:application/json');

if ($_SERVER['REQUEST_METHOD']!=='POST'){
  header("HTTP/1.0 405 Method Not Allowed");
  die();
}

$_POST = json_decode(file_get_contents('php://input'), true);

if (is_null($_POST['deviceId'])){
  header("HTTP/1.0 204 No Content");
  die();
}


//8 bytes message
$message = "cafecafecafecafe";
$payload = array($_POST['deviceId']=>array('downlinkData'=>$message));
echo json_encode($payload);

?>
