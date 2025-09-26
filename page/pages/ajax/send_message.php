<?php
  header('Content-Type: application/json');
   $response['content']=array('status' => 'ERROR');

    include('../../common/connect.php');

    //name,email,company,projectDescription
    $name = $_POST['name'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $projectDescription = $_POST['projectDescription'];

    /*include_once("../../common/Database.php");
    include_once("../../models/Category.php");

    // Instantiate DB and Connect to It
    $database = new Database();
    $db = $database->connect();


    // Instantiate Category object
    $cat = new Category($db);

    // Get raw data
    $data = file_get_contents("php://input") != null ? json_decode(file_get_contents("php://input")) : die();

    $cat->id = $data->id;
    $cat->name = $data->name;

    if ($cat->update()) {
        echo json_encode(["message" => "✅ Category Updated!"]);
    } else {
        echo json_encode(["message" => "❌ Cannot Update the Category!"]);
    }*/

    echo json_encode( ["message" => $name." ".$email." ".$company." ".$projectDescription]);
?>