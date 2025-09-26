<?php
	//start session
	session_start();
	header('Content-Type: application/json');	
	require("../../common/MySQLIDatabase.php");

	if (!isset($_SESSION["user_id"]) && !isset($_SESSION["email"]))
		echo json_encode(array('status' => 'SESSION ERROR'));
	if ($mysqli->connect_error) {
    	echo json_encode(["status" => "ERROR", "message" => "DB connection failed"]);
    	exit;
	}
	//array responce
	$response=array('status' => 'ERROR');
	//get data
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$type=$_POST['type'];

	$query = "select * from users where email='$email' or username='$name'";
	//$response['status'] = $query;
	try{
		$res = mysqli_query($dbh,$query);
		$num = mysqli_num_rows($res);
		if($num > 0){
			$response['status'] = 'Ya existe una pregunta con el mismo identificador';
		}else{
			$query = "INSERT INTO users (username,email,password,type)VALUES('$name','$email','$password',$type);";
			$response['status'] = $query;
			$res = mysqli_query($dbh,$query);
			if ($res){
				$response['status']='OK';
			}
			else{
				$response['status']= 'Error al insertar '.$query;
			}
		}
		mysqli_close($dbh);	
	}catch(Exception $e){
		$response['status'] = "'$e'";
	}
	echo json_encode($response);
?>