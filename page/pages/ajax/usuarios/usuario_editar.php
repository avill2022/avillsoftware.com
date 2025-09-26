<?php
  header('Content-Type: application/json');
  $response=array('status' => 'ERROR');
  include('../../../common/connect.php');

  $idusuario = $_POST['idusuario'];
    
  $query='SELECT * FROM `usuario` WHERE `idusuario`='.$idusuario.';';
  $result=mysqli_query($dbh, $query);
  $total=mysqli_num_rows($result);
  
  if ($result)
  {
    if ($total>0)
    {
      $ren=mysqli_fetch_array($result);
        $response['iddepto']=$ren['iddepto'];
        $response['nombres']=$ren['nombres'];
        $response['correo']=$ren['correo'];
        $response['cargo']=$ren['cargo'];
        $response['pass']=$ren['pass'];

    }
    else
    {

    } 
    $response['status']='OK';
  }
  echo json_encode($response);
?>