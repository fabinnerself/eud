<?php

$firstname = htmlspecialchars($_REQUEST['firstname']);
$lastname = htmlspecialchars($_REQUEST['lastname']);
$phone = htmlspecialchars($_REQUEST['phone']);
$email = htmlspecialchars($_REQUEST['email']);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'database.php';
include_once 'users.php';

$database = new Database();
$db = $database->getConnection();
$item = new Usuario($db);

$item->firstname = $firstname;
$item->lastname = $lastname;
$item->phone = $phone;
$item->email = $email;

if (filter_var($email, FILTER_VALIDATE_EMAIL)){

    if($item->createUser()){
        //echo 'Usuario creado correctamente.';

		echo json_encode(array(
			'id' => 1,
			'firstname' => $firstname,
			'lastname' => $lastname,
			'phone' => $phone,
			'email' => $email
		));

    } else{
		echo json_encode(array('errorMsg'=>'Ocurrieron errores al crear el usuario.'));
    }

} else {
	echo json_encode(array('errorMsg'=>'Invalid data.'));
}
?>