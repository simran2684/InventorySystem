<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods');

    include_once '../../config/Database.php';
    include_once '../../models/Buy.php';
    
    //Connect the Database
    $database = new Database();
    $db = $database->connect();

    // Create new buy object
    $buy = new Buy($db);

    // Get the raw posted data
    $data = json_decode(file_get_contents("php://input"));

    //Make sure key is here
    $buy->customerNum = $data->customerNum;

    $buy->productNum = $data->productNum;
    $buy->price = $data->price;


    //Create the buy
    if ($buy->updateBuy()) {
        echo json_encode(
            array('message' => 'Data Updated')
        );
    } else {
        echo json_encode(
            array('message' => 'Unable to update data')
        );
    }