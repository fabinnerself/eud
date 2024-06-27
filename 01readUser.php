<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$offset = ($page-1)*$rows;
	$result = array();

    include_once 'database.php';
    include_once 'users.php';

    $database = new Database();
    $db = $database->getConnection();
    $items = new Usuario($db);

    $itemCount = $items->getCountUsers();

    $stmt = $items->getUsers($offset,$rows);

    //echo "rows : $itemCount "; 
       

    if($itemCount > 0){
        
        $ClienteArr = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "firstname" => $firstname,
                "lastname" => $lastname,
                "phone" => $phone,
                "email" => $email
            );
            
            array_push($ClienteArr, $e);
        }

        $result["total"] = $itemCount;
        $result["rows"] = $ClienteArr;
        header('Content-type: application/json');
        echo json_encode($result);
    }
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>