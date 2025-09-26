<?php
	//start session
	session_start();
	header('Content-Type: application/json');	
	require("../../common/MySQLIDatabase.php");

	if (!isset($_SESSION["course_id"]) && !isset($_SESSION["email"]))
		echo json_encode(array('status' => 'SESSION ERROR'));
	if ($mysqli->connect_error) {
    	echo json_encode(["status" => "ERROR", "message" => "DB connection failed"]);
    	exit;
	}
    // "id":id, "title": title, "instructor": instructor, "description": description
    //array responce
	$response=array('status' => 'ERROR');	
	//get data
    $id=$_POST['id'];
	$title=$_POST['title'];
	$instructor=$_POST['instructor'];
    $description=$_POST['description'];

    $query="UPDATE courses SET title='$title',instructor='$instructor',description='$description' WHERE id=$id";
    //$response['status'] =$query;
    try{
        $res = mysqli_query($dbh,$query);
        if ($res){
            $response['status']='OK';
        }
        else{
            $response['status']='Error al actualizar...'.$query;
        }
        mysqli_close($dbh);	
    }catch(Exception $e){
		$response['status'] = "'$e'";
	}
	echo json_encode($response);
?>
