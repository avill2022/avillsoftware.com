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
	$id = $_POST['id'];
	$query = "select * from users where id=$id";
	try{
		$res = mysqli_query($dbh,$query);
		$num = mysqli_num_rows($res);
		if($num > 0){
			$query ="delete from users where id=$id";
			$res = mysqli_query($dbh,$query);
			if ($res){
				$response['status']='OK';
			}
			else{
				$response['status']='Error al eliminar '.$query;
			}
		}else{
			$respones['status'] = "No exite el registro";
		}
		mysqli_close($dbh);	
	}catch(Exception $e){
		$response['status'] = "'$e'";
	}	
	echo json_encode($response);
?>