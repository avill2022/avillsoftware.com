<?php
    session_start();	
	header('Content-Type: application/json');
	$response=array('status' => 'ERROR');
	$idusuario = $_POST['idusuario'];
	
	include('../../../common/connect.php'); 

    $res = mysqli_query($dbh,'SELECT * FROM `usuario` WHERE `idusuario`='.$idusuario.';');
	$num = mysqli_num_rows($res);
	if($num > 0){
		$res = mysqli_query($dbh,'DELETE FROM `usuario` WHERE `idusuario`='.$idusuario.';');
		if ($res)
		{
			$response['status']='OK';
		}
		else
		{
			$response['status']='Error al eliminar usuario'.'DELETE FROM `usuario` WHERE `idusuario`='.$idusuario.';';
		}

	}else{
        $respones['status'] = "No exite el registro";
    }
    mysqli_close($dbh);
	echo json_encode($response);
?>