<?php
  header('Content-Type: application/json');
  $response=array('status' => 'ERROR');

  include('../../../common/connect.php');
  $result=mysqli_query($dbh, "SELECT * FROM `depto`;");
  $total=mysqli_num_rows($result);

  $deptos='
  <select id="depto">
  ';

  if($result)
  {
    if ($total>0)
    {
      while ($ren=mysqli_fetch_array($result))
      {
        $deptos.='<option value="'.$ren['nombre'].'">'.$ren['nombre'].'</option>';
      }
    }
  } 
  $deptos.='</select>';

  $response['content']='
      <div id="black-studio-tinymce-17" class="widget-wrapper widget_black_studio_tinymce">
            <div class="widget-title"><h3>AGREGA USUARIO</h3></div>
            <form enctype="multipart/form-data" class="formulario">
             <table id="tablacont" class="table">
                <tr>
                  <td>Departamento</td>
                  <td>'.$deptos.'</td>
                </tr>
                <tr>
                  <td>Nombre</td>
                  <td><input type="text" class="form-control" id="nombre" placeholder="Escriba el nombre del depto" required/></td>
                </tr>
                <tr>
                  <td>Correo</td>
                  <td><input type="email" class="form-control" id="correo" placeholder="Correo electronico" required/></td>
                </tr>
                <tr>
                  <td>Cargo</td>
                  <td><input type="text" class="form-control" id="cargo" placeholder="Cargo" required/></td>
                </tr>
                <tr>
                  <td>Contraseña</td>
                  <td><input type="password" class="form-control" id="pass" placeholder="Escriba el nombre del depto" required/></td>
                </tr>

                <tr>
                  <td><div align="right"><button onclick="javascript:usuarios_lista()" type="button" class="btn btn">Cancelar</button></div></td>
                  <td><div align="right"><button onclick="javascript:usuario_guardar()" type="button" class="btn btn-primary">Agregar</button></div></td>
                </tr>
               <div id="mensaje1" class="alert alert-danger" role="alert" style="display:none">
                  Todos los campos son obligatorios!
                </div>
              </table>
              </form>
      </div>
      ';
      $response['status']='OK';
    echo json_encode($response);
  ?>