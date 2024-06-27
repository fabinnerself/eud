<?php

include_once 'database.php';
include_once 'users.php';

$database = new Database();
$db = $database->getConnection();
$item = new Usuario($db);

$item->id = intval($_REQUEST['id']);
 
if($item->deleteUser()){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>