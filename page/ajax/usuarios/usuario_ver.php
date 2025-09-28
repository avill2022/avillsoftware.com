<?php
  header('Content-Type: application/json');
  $response=array('status' => 'ERROR');

  include('../../../common/connect.php');
  
  $Idnota = $_POST['Idnota'];
  $result=mysqli_query($dbh, 'SELECT * FROM `departamentos` WHERE ` iddepartamento`='.$Idnota);
  $total=mysqli_num_rows($result);
  
  if ($result)
  {
    if ($total>0)
    {
      while ($ren=mysqli_fetch_array($result))
      {
        $response['IdNota']=$ren['IdNota'];
          $response['Titulo']=$ren['Titulo'];
          $response['Fecha']=$ren['Fecha'];
          $response['Texto']=$ren['Texto'];
      }
    }
    else
    {

    } 
    $response['status']='OK';
  }
  $time=date("U");
  $response['content']='
      <div id="black-studio-tinymce-17" class="widget-wrapper widget_black_studio_tinymce">
            <div class="widget-title"><h3>'.$response['Titulo'].'</h3><div style="height: 10px;background: #f48420;"></div></div>
            <div class="fb_loader" style="text-align: center !important;">
                  <!--<img src="../common/img/my-loader.gif" alt="Facebook Pagelike Widget" />-->
            </div>
            <div>'.$response['Fecha'].'</div>
            <p></p>
            <img src="common/img/noticias/p'.$response['IdNota'].'.jpg?tierranueva='.$time.'"  alt="Titulo foto"/>
            <p></p>
            <div><p align="justify">'.$response['Texto'].'</p></div>
      </div>
      </br>

      <div id="black-studio-tinymce-17" class="widget-wrapper widget_black_studio_tinymce">
      <div class="widget-title"><h3>Portafolio Noticias</h3></div>
      <div id="portafolio_noticias"></div>

      </div>
      ';
      $response['status']='OK';
    mysqli_close($dbh);
    echo json_encode($response);
  ?>