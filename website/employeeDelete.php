<?php
    ob_start();
    header('Access-Control-Allow-Origin: *');
    //header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods');

    include_once '../config/Database.php';
    include_once '../models/Employee.php';
    
    //Connect the Database
    $database = new Database();
    $db = $database->connect();

    // Instantiate employee object
    $employee = new Employee($db);

    // Set the id for the delete
    $employee->employeeId = $_GET['employeeId'];

    echo 'Hello world';
    echo $_GET['employeeId'];
    // Delete employee
    if ($employee->deleteEmployee()) {
        echo json_encode(
            array('message' => 'Employee Deleted')
        );
        //header('location: employeeList.php');
    } else {
        echo json_encode(
            array('message' => 'Unable to delete employee')
        );
    }