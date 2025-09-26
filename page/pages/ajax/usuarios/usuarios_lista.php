<?php
	header('Content-Type: application/json');
	$response=array('status' => 'ERROR');
	
	include('../../../common/connect.php');
	
	$content='<div id="black-studio-tinymce-17" class="widget-wrapper widget_black_studio_tinymce">
            <div class="widget-title"><h3>Administrador</h3></div>';
	$content.='<table class="table" align="center">';
	$content.='<tr>';
	$content.='<td><b>Id</b></td>';
	$content.='<td><b>Nombre</b></td>';
    $content.='<td colspan="2"><div align="center">Acciones</div></td>';
	$content.='</tr>';
	
	$result=mysqli_query($dbh, "SELECT * FROM `usuario` ORDER BY idusuario");
	$total=mysqli_num_rows($result);
	
	if ($result)
	{
		if ($total>0)
		{
			while ($ren=mysqli_fetch_array($result))
			{
				$content.='<tr>';
                $content.='<td>'.$ren['idusuario'].'</td>';
                $content.='<td>'.$ren['nombres'].'</td>';			
				$content.='<td ><a onClick="javascript:usuario_eliminar('.$ren['idusuario'].')">
					<img src="common/img/iconos/eliminar.png" width="30" height="30"></img>
				</a></td>';
                $content.='<td align="center" width="10%">
            	<a onClick="javascript:usuario_editar('.$ren['idusuario'].')">
            		<img src="common/img/iconos/editar.png" width="30" height="30"></img>
            	</a>
            	</td>';
				$content.='</tr>';
			}
		}
		else
		{
			$content.='<tr>';
			$content.='<td colspan="4">No existen registros...</td>';
			$content.='</tr>';
		}	
		$content.='<tr>
		<td colspan="3">
		<div align="right">
			<button onclick="javascript:entrar()" type="button" class="btn btn-">Cancelar</button>
		</div>
		</td>
		<td colspan="2"><div align="right"><button onclick="javascript:usuario_formulario()" type="button" class="btn btn-primary">Agregar</button></div></td>
		</tr>
		</table></div>';
		$response['status']='OK';
		$response['content']=$content;
	}	
	mysqli_close($dbh);	
	echo json_encode($response);
?>