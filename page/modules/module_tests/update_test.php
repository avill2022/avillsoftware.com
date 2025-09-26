<?php
	//start session
	session_start();
	header('Content-Type: application/json');	
	require("../../common/MySQLIDatabase.php");

	if (!isset($_SESSION["test_id"]) && !isset($_SESSION["email"]))
		echo json_encode(array('status' => 'SESSION ERROR'));
	if ($mysqli->connect_error) {
    	echo json_encode(["status" => "ERROR", "message" => "DB connection failed"]);
    	exit;
	}
    //array responce
	$response=array('status' => 'ERROR');	
	//get data
    $id=$_POST['id'];
	$name=$_POST['name'];
	$email=$_POST['email'];
    $password=$_POST['password'];
	$type=$_POST['type'];

    $query="UPDATE tests SET testname='$name',email='$email',type=$type WHERE id=$id";
	//$response['status'] = $name.' '.$email.' '.$password.' '.$type;
    if($password != ''){
        $pass_hash = password_hash($password, PASSWORD_BCRYPT);
        $query="UPDATE tests SET testname='$name',email='$email',password='$pass_hash',type=$type WHERE id=$id";
    }
    $response['status'] =$query;
    try{
        //$response['status'] = ' '.$id.' - '.$query;
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
