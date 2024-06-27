<?php

include_once 'database.php';
include_once 'users.php';

$database = new Database();
$db = $database->getConnection();
$item = new Usuario($db);

$item->id = intval($_REQUEST['id']);
$item->firstname = htmlspecialchars($_REQUEST['firstname']);
$item->lastname =htmlspecialchars($_REQUEST['lastname']);
$item->phone = htmlspecialchars($_REQUEST['phone']);
$item->email = htmlspecialchars($_REQUEST['email']);

 //echo " fn ".$item->firstname;


if($item->updateUser()){
	echo json_encode(array(
		'id' => $item->id,
		'firstname' => $item->firstname,
		'lastname' => $item->lastname,
		'phone' => $item->phone,
		'email' => $item->email
	));
} else{
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
 
?>