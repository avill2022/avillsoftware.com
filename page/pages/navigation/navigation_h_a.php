<?php
include('common/connect.php');
$result=mysqli_query($dbh, "SELECT * FROM `depto` ORDER BY iddepto");
$total=mysqli_num_rows($result);
$deptos='';
if ($result)
  {
    if ($total>0)
    {
      while ($ren=mysqli_fetch_array($result))
      {
        if($ren['nombre']!="ADMINISTRADOR" && $ren['nombre']!="TRANSPARENCIA"){
                  $deptos.='
        <li id="" class="">
          <a onclick="javascript:departamentos(\''.$ren['iddepto'].'\')">'.$ren['nombre'].'</a>
        </li>';
      }
        }

    }
    else
    {

    } 
  } 
mysqli_close($dbh); 
?>
<div id="wrapper-menu" class="sticky-wrapper td-sticky" style="height: 70px;">
  <div class="td-wrapper-box td-shadow">
    <div class="main-nav">
      <ul id="menu-main" class="menu">
        <li><a href="javascript:getInicio()">Inicio</a></li>
        <li><a href="javascript:hcabildo()">H. Cabildo</a></li>
        <li><a href="javascript:transparencia()">Transparencia</a></li>
        <li><a href="#">Departamentos</a><ul class=""><?php echo $deptos;?></ul></li>
        <li><a href='javascript:contacto()'>Contacto</a></li>

        <li><a id="administrar" style="display: none;" href='javascript:entrar()'>Admin</a></li>
        <li id='entrar'><a href='javascript:getLogin()'>Entrar</a></li> 
        <li><a id="salir" style="display: none;" href='javascript:salir()'>Salir</a></li>
      </ul>
    </div>
  </div>  
  <div id="bar_orange"></div>
</div>
