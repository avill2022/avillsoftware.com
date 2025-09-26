<?php
  header('Content-Type: application/json');
   $response['content']=array('status' => 'ERROR');

    include('../../../common/connect.php');

    $idusuario = $_POST['idusuario'];
    $iddepto = $_POST['depto'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $cargo = $_POST['cargo'];
    $pass = $_POST['pass'];


    if($idusuario!=0){
        $query='UPDATE `usuario` SET `iddepto`=\''.$iddepto.'\',`nombres`=\''.$nombre.'\',`correo`=\''.$correo.'\',`cargo`=\''.$cargo.'\',`pass`=\''.$pass.'\' WHERE `idusuario`='.$idusuario.';';
        $res = mysqli_query($dbh,$query);
        if ($res)
        {
             $response['content']='OK';
        }
        else
        {
             $response['content']='Actualizacion Error: '.$query;
        }
    }else{
        $query='SELECT * FROM `usuario` WHERE `nombres`="'.$nombre.'";';

        $res = mysqli_query($dbh,$query);
        $num = mysqli_num_rows($res);

        if($num > 0){

             $response['content'] = "REPETIDO";

        }else{
            $query='INSERT INTO `usuario`( `iddepto`, `nombres`, `correo`, `cargo`, `pass`) VALUES ("'.$iddepto.'",\''.$nombre.'\',\''.$correo.'\',\''.$cargo.'\',\''.$pass.'\');';
            $res = mysqli_query($dbh,$query);
            if ($res)
            {
                $query='SELECT MAX(`idusuario`) AS MaxId FROM `usuario`';
                $res = mysqli_query($dbh,$query);
                if ($ren=mysqli_fetch_array($res))
                {
                    $idusuario=$ren['MaxId'];
                     $response['content']='OK';
                }
                
            }
            else
            {
                 $response['content']=$query;
            }
        }
    }
    mysqli_close($dbh);

 echo json_encode( $response['content']);
?>