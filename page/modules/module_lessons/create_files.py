# create_files.py

# Ask the {{PREFIX}} for a prefix
prefix = input("Enter a prefix for the files: ").strip()

# Predefined content for JS file
_module_ = """

$(document).ready(function () {
   
});
//
function modal_insert_{{PREFIX}}(){
    $('#name_{{PREFIX}}_modal').val('');	
    $('#email_{{PREFIX}}_modal').val('');	

    $('#password_{{PREFIX}}_modal').val('');	
    $('#password_{{PREFIX}}_modal_label').val('Contraseña');
    $('#password_{{PREFIX}}_modal').prop('required', true);
    
    $('#password_repeat_{{PREFIX}}_modal').val('');	
    $('#password_repeat_{{PREFIX}}_modal').prop('required', true);
    $('#password_repeat_{{PREFIX}}_modal_label').val('Repite la contraseña');

    $('#type_{{PREFIX}}_modal').val('0');
    $('#{{PREFIX}}_dialog').show();	
    $('#save_{{PREFIX}}_form').off('submit').on('submit', function (e) {
       e.preventDefault();
        var password = $('#password_{{PREFIX}}_modal').val();	
        var password_repeat = $('#password_repeat_{{PREFIX}}_modal').val();	
        if(password == password_repeat){
            var name = $('#name_{{PREFIX}}_modal').val();	
            var email = $('#email_{{PREFIX}}_modal').val();	
            var type = $('#type_{{PREFIX}}_modal').val();
            colse_modals();
            insert_{{PREFIX}}(name,email,type,password,password_repeat);
        }else{
            alert("Las contraseñas no coinciden")
        }
    });
}
function modal_edit_{{PREFIX}}(id,{{PREFIX}}name,email,type,created_at){
    $('#name_{{PREFIX}}_modal').val({{PREFIX}}name);	
    $('#email_{{PREFIX}}_modal').val(email);	

    //$('#password_{{PREFIX}}_modal').val(password);
    //$('#password_{{PREFIX}}_modal_label').val('Contraseña anterior');
    $('#password_{{PREFIX}}_modal').prop('required', false);

    //$('#password_repeat_{{PREFIX}}_modal').val(password);	
    $('#password_repeat_{{PREFIX}}_modal').prop('required', false);
    //$('#password_repeat_{{PREFIX}}_modal_label').val('Nueva Contraseña');

    $('#type_{{PREFIX}}_modal').val(type);
    $('#{{PREFIX}}_dialog').show();
    $('#save_{{PREFIX}}_form').off('submit').on('submit', function (e) {
       e.preventDefault();
        var password = $('#password_{{PREFIX}}_modal').val();	
        var password_repeat = $('#password_repeat_{{PREFIX}}_modal').val();
        if(password == password_repeat){
            var {{PREFIX}}name = $('#name_{{PREFIX}}_modal').val();	
            var email_ = $('#email_{{PREFIX}}_modal').val();	
            var type_ = $('#type_{{PREFIX}}_modal').val();
            colse_modals();
            edit_{{PREFIX}}(id,{{PREFIX}}name,email_,type_,created_at,password)
        }else{
            alert("Las contraseñas no coinciden")
        }

    });
}
//{{PREFIX}}s
function get_{{PREFIX}}s() {
    $.ajax({
        url: "../modules/module_{{PREFIX}}s/get_{{PREFIX}}s.php",
        type: "post",
        data: {},
        dataType: 'json',
        beforeSend: function(){
            $('#loading').show();	
        },
        success: function (data) {
            if (data.status == "OK") {
                $('#content').html(data.tabla);
                $('#loading').hide();
            } else {
                $('#loading').hide();
                alert(data.status);
            }
        },
        error: function () {
            alert("Error en ajax/get_{{PREFIX}}s.php");
            $('#loading').show();	
        }
    });
}
function insert_{{PREFIX}}({{PREFIX}}name,email,type,password,password_repeat){
    $.ajax({
        url: "../modules/module_{{PREFIX}}s/insert_{{PREFIX}}.php",
        type: "post",
        data: { "email": email, "password": password, "name": {{PREFIX}}name, "type":type },
        dataType: 'json',
        beforeSend: function(){
            $('#loading').show();	
        },
        success: function (data) {
            if (data.status == "OK") {
                get_{{PREFIX}}s();
                $('#loading').hide();
            } else {
                $('#loading').hide();
                alert(data.status);
            }
        },
        error: function () {
            alert("Error en ajax/insert_{{PREFIX}}.php");
            $('#loading').hide();
        }
    });
}
function edit_{{PREFIX}}(id,{{PREFIX}}name,email,type,created_at,password){
    $.ajax({
        url: "../modules/module_{{PREFIX}}s/update_{{PREFIX}}.php",
        type: "post",
        data: { "id":id, "name": {{PREFIX}}name, "email": email, "password": password, "type":type },
        dataType: 'json',
        beforeSend: function(){
            $('#loading').show();	
        },
        success: function (data) {
            if (data.status == "OK") {
                //$(btnh.concat(clave)).attr("onclick", "javascript:habilita_edicion(" + clave + ")");
                get_{{PREFIX}}s();
                $('#loading').hide();
                $('#campo_clave').show();
                $('#campo_pregunta').show();
                $('#btn_agrega').show();
            } else {
                $('#loading').hide();
                get_{{PREFIX}}s();
                alert(data.status);
            }
        },
        error: function () {
            alert("Error en ajax/update_{{PREFIX}}.php");
            $('#loading').hide();
        }
    });
}
function delete_{{PREFIX}}(id){
    if (confirm("Do you want to continue?")) {
        $.ajax({
            url: "../modules/module_{{PREFIX}}s/delete_{{PREFIX}}.php",
            type: "post",
            data: { 'id': id },
            dataType: 'json',
            beforeSend: function(){
                $('#loading').show();	
            },
            success: function (data) {
                if (data.status == "OK") {
                    get_{{PREFIX}}s();
                }
                else {
                    alert(data.status);
                }
                $('#loading').hide();
            },
            error: function () {
                alert("Error en ajax/delete_{{PREFIX}}.php");
            }
        });
    } else {
        console.log("{{PREFIX}} canceled");
    }
    
}
function colse_modals(){
    $('#{{PREFIX}}_dialog').hide();	
}
function toggle_menu_{{PREFIX}}(id){
    $(id).toggle();
}
"""
# Predefined content for PHP file
delete_ = """<?php
	//start session
	session_start();
	header('Content-Type: application/json');
	require("../../common/MySQLIDatabase.php");

	if (!isset($_SESSION["{{PREFIX}}_id"]) && !isset($_SESSION["email"]))
		echo json_encode(array('status' => 'SESSION ERROR'));
	
	if ($mysqli->connect_error) {
    	echo json_encode(["status" => "ERROR", "message" => "DB connection failed"]);
    	exit;
	}
	//array responce
	$response=array('status' => 'ERROR');
	//get data
	$id = $_POST['id'];
	$query = "select * from {{PREFIX}}s where id=$id";
	try{
		$res = mysqli_query($dbh,$query);
		$num = mysqli_num_rows($res);
		if($num > 0){
			$query ="delete from {{PREFIX}}s where id=$id";
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
"""
get_ = """<?php
	//start session
	session_start();
	header('Content-Type: application/json');
	require("../../common/MySQLIDatabase.php");

	if (!isset($_SESSION["{{PREFIX}}_id"]) && !isset($_SESSION["email"]))
		echo json_encode(array('status' => 'SESSION ERROR'));
	
	if ($mysqli->connect_error) {
    	echo json_encode(["status" => "ERROR", "message" => "DB connection failed"]);
    	exit;
	}
	
	$response=array('status' => 'ERROR');
	

	function get_item($id,${{PREFIX}}name,$email,$created_at,$type):string{
		return '<tr class="border-b border-white/10 hover:bg-white/5 transition-colors">
							<td class="p-4">'.$id.'</td>
                            <td class="p-4">'.${{PREFIX}}name.'</td>
                            <td class="p-4 text-white/70">'.$email.'</td>
                            <td class="p-4 text-white/70">'.$created_at.'</td>
							<td class="p-4 text-white/70">'.$type.'</td>
                            <td class="p-4 text-right">
							    <button
									onclick="javascript:toggle_menu_{{PREFIX}}(menu_{{PREFIX}}'.$id.')"
                                    class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10"
                                    type="button" id="radix-:ra:" aria-haspopup="menu" aria-expanded="false"
                                    data-state="closed">
                                    
									<div>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
											fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
											stroke-linejoin="round" class="h-4 w-4">
											<circle cx="12" cy="12" r="1">
											</circle>
											<circle cx="19" cy="12" r="1">
											</circle>
											<circle cx="5" cy="12" r="1">
											</circle>
										</svg>

										<div
											id="menu_{{PREFIX}}'.$id.'"
											data-radix-popper-content-wrapper="" dir="ltr"
											style="display:none; position: absolute; min-width: max-content; z-index: 50; --radix-popper-available-width: 1875px; --radix-popper-available-height: 362px; --radix-popper-anchor-width: 40px; --radix-popper-anchor-height: 40px; --radix-popper-transform-origin: 50% 0px;">
											<div data-side="bottom" data-align="center" role="menu" aria-orientation="vertical" data-state="open"
												data-radix-menu-content="" dir="ltr" id="radix-:r2i:" aria-labelledby="radix-:r2h:"
												class="z-50 min-w-[8rem] overflow-hidden rounded-md border border-slate-700 bg-slate-900 p-1 text-white shadow-md animate-in data-[side=bottom]:slide-in-from-top-2 data-[side=left]:slide-in-from-right-2 data-[side=right]:slide-in-from-left-2 data-[side=top]:slide-in-from-bottom-2"
												tabindex="-1" data-orientation="vertical"
												style="outline: none; --radix-dropdown-menu-content-transform-origin: var(--radix-popper-transform-origin); --radix-dropdown-menu-content-available-width: var(--radix-popper-available-width); --radix-dropdown-menu-content-available-height: var(--radix-popper-available-height); --radix-dropdown-menu-trigger-width: var(--radix-popper-anchor-width); --radix-dropdown-menu-trigger-height: var(--radix-popper-anchor-height); pointer-events: auto;">
												<div 
													id="edit_{{PREFIX}}'.$id.'"
													onclick="javascript:modal_edit_{{PREFIX}}('. $id .','.'\'' . addslashes(${{PREFIX}}name) .'\','.'\'' . addslashes($email) .'\','. $type .',\'' . addslashes($created_at) .'\')"
													role="menuitem"
													class="relative flex select-none items-center rounded-sm px-2 py-1.5 text-sm outline-none transition-colors focus:bg-slate-800 focus:text-white data-[disabled]:pointer-events-none data-[disabled]:opacity-50 cursor-pointer hover:!bg-slate-700"
													tabindex="-1" data-orientation="vertical" data-radix-collection-item="">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-4 w-4">
														<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.12 2.12 0 0 1 3 3L12 15l-4 1 1-4Z"></path>
													</svg>
													<span>Editar</span>
												</div>
												<div id="delete_{{PREFIX}}'.$id.'"
													onclick="javascript:delete_{{PREFIX}}('.$id.')"
													role="menuitem"
													class="relative flex select-none items-center rounded-sm px-2 py-1.5 text-sm outline-none transition-colors focus:bg-slate-800 focus:text-white data-[disabled]:pointer-events-none data-[disabled]:opacity-50 text-red-400 cursor-pointer hover:!bg-red-500/20 hover:!text-red-400 focus:!bg-red-500/20 focus:!text-red-400"
													tabindex="-1" data-orientation="vertical" data-radix-collection-item="">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
														stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-4 w-4">
														<path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
														<line x1="10" x2="10" y1="11" y2="17"></line>
														<line x1="14" x2="14" y1="11" y2="17"></line>
													</svg>
													<span>Eliminar</span>
												</div>
											</div>
										</div>
									</div>
                                </button>
                            </td>
                        </tr>';
	}

	try{
		$result=mysqli_query($dbh, "select * from {{PREFIX}}s;");
		$total=mysqli_num_rows($result);
		
		if ($result){
			if ($total>0){
				$content_table='';
				while ($ren=mysqli_fetch_array($result)){
					$content_table.= get_item($ren['id'],$ren['{{PREFIX}}name'],$ren['email'],$ren['created_at'],$ren['type']);
				}
			}
			else{
				$content_table='</tr>';
				$content_table.='<tr>';
				$content_table.='<td colspan="6">No existen registros...</td>';
				$content_table.='</tr>';
			}
			$table='<div style="opacity: 1; transform: none;">
				<div class="flex justify-between items-center mb-8">
					<h1 class="text-4xl font-bold">Gestión de Cursos</h1>
					<button
						id="modal_{{PREFIX}}"
						onClick="javascript:modal_insert_{{PREFIX}}()"
						class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700"
						type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-:r7:" data-state="closed">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
							stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
							class="mr-2 h-5 w-5">
							<circle cx="12" cy="12" r="10">
							</circle>
							<path d="M8 12h8">
							</path>
							<path d="M12 8v8">
							</path>
						</svg>Crear Usuario</button>
				</div>
				<div class="rounded-xl border border-white/20 bg-white/10 backdrop-blur-xl text-white shadow-xl glass-effect">
					<div class="p-0">
						<div class="overflow-x-auto">
							<table class="w-full text-left">
								<thead class="bg-white/5">
									<tr>
										<th class="p-4 font-semibold">Id</th>
										<th class="p-4 font-semibold">Nombre</th>
										<th class="p-4 font-semibold">Email</th>
										<th class="p-4 font-semibold">Fecha</th>
										<th class="p-4 font-semibold">Tipo</th>
										<th class="p-4 font-semibold text-right">Acciones</th>
									</tr>
								</thead>
								<tbody>'.$content_table.'</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>';
			$response['status']='OK';
			$response['tabla']=$table;
		}	
		mysqli_close($dbh);		
	}catch(Exception $e){
		$response['status'] = "'$e'";
	}
	echo json_encode($response);
?>

"""
insert_ = """<?php
	//start session
	session_start();
	header('Content-Type: application/json');	
	require("../../common/MySQLIDatabase.php");

	if (!isset($_SESSION["{{PREFIX}}_id"]) && !isset($_SESSION["email"]))
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

	$query = "select * from {{PREFIX}}s where email='$email' or {{PREFIX}}name='$name'";
	//$response['status'] = $query;
	try{
		$res = mysqli_query($dbh,$query);
		$num = mysqli_num_rows($res);
		if($num > 0){
			$response['status'] = 'Ya existe una pregunta con el mismo identificador';
		}else{
			$query = "INSERT INTO {{PREFIX}}s ({{PREFIX}}name,email,password,type)VALUES('$name','$email','$password',$type);";
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
"""
modal_ = """<div id="{{PREFIX}}_dialog" style="display: none;">
        
    <div data-state="open" class="fixed inset-0 z-50 bg-black/80 backdrop-blur-sm data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0" style="pointer-events: auto;" data-aria-hidden="true" aria-hidden="true"></div>
    <div  role="dialog" id="radix-:r7:" aria-describedby="radix-:r9:" aria-labelledby="radix-:r8:" data-state="open"
        class="fixed left-[50%] top-[50%] z-50 grid w-full max-w-lg translate-x-[-50%] translate-y-[-50%] gap-4 border p-6 shadow-lg duration-200 data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 data-[state=closed]:slide-out-to-left-1/2 data-[state=closed]:slide-out-to-top-[48%] data-[state=open]:slide-in-from-left-1/2 data-[state=open]:slide-in-from-top-[48%] rounded-lg sm:max-w-[425px] bg-slate-900 border-slate-700 text-white"
        tabindex="-1" style="pointer-events: auto;">
        <div class="flex flex-col space-y-1.5 text-center sm:text-left">
            <h2 id="radix-:r8:" class="text-lg font-semibold leading-none tracking-tight text-white">Editar Curso</h2>
            <p id="radix-:r9:" class="text-sm text-white/70">Modifica los detalles del curso.</p>
        </div>
        <form id="save_{{PREFIX}}_form">
            <div class="grid gap-4 py-4">
                <!--Name-->
                <div class="grid grid-cols-4 items-center gap-4">
                    <label
                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-white text-right"
                        for="name_{{PREFIX}}_modal">Nombre</label>
                    <input
                        class="flex h-12 w-full rounded-lg border border-white/20 bg-white/10 backdrop-blur-sm px-4 py-3 text-sm text-white placeholder:text-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent disabled:cursor-not-allowed disabled:opacity-50 transition-all duration-200 col-span-3"
                        id="name_{{PREFIX}}_modal" name="name" required="" value="">
                </div>
                <!--Email-->
                <div class="grid grid-cols-4 items-center gap-4">
                    <label
                        id = "email"
                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-white text-right"
                        for="email_{{PREFIX}}_modal">Correo</label>
                    <input
                        type="email"
                        class="flex h-12 w-full rounded-lg border border-white/20 bg-white/10 backdrop-blur-sm px-4 py-3 text-sm text-white placeholder:text-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent disabled:cursor-not-allowed disabled:opacity-50 transition-all duration-200 col-span-3"
                        id="email_{{PREFIX}}_modal" name="email" required="" value="">
                </div>
                <!--Password-->
                <div class="grid grid-cols-4 items-center gap-4">
                    <label
                        id = "password_{{PREFIX}}_modal_label"
                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-white text-right"
                        for="password_{{PREFIX}}_modal">Contraseña</label>
                    <input
                        type="password"
                        class="flex h-12 w-full rounded-lg border border-white/20 bg-white/10 backdrop-blur-sm px-4 py-3 text-sm text-white placeholder:text-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent disabled:cursor-not-allowed disabled:opacity-50 transition-all duration-200 col-span-3"
                        id="password_{{PREFIX}}_modal" name="password" required="" value="">
                </div>
                <!--Password repeat-->
                <div class="grid grid-cols-4 items-center gap-4">
                    <label
                        id = "password_repeat_{{PREFIX}}_modal_label"
                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-white text-right"
                        for="password_repeat_{{PREFIX}}_modal">Repite la contraseña</label>
                    <input
                        type="password"
                        class="flex h-12 w-full rounded-lg border border-white/20 bg-white/10 backdrop-blur-sm px-4 py-3 text-sm text-white placeholder:text-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent disabled:cursor-not-allowed disabled:opacity-50 transition-all duration-200 col-span-3"
                        id="password_repeat_{{PREFIX}}_modal" name="password" required="" value="">
                </div>
                <!--Type-->
                <div class="grid grid-cols-4 items-center gap-4">
                    <label
                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-white text-right"
                        for="type_{{PREFIX}}_modal">Typo</label>
                        <!--<textarea
                        class="flex min-h-[80px] w-full rounded-lg border border-white/20 bg-white/10 px-4 py-3 text-sm text-white placeholder:text-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent disabled:cursor-not-allowed disabled:opacity-50 transition-all duration-200 col-span-3"
                        id="description" name="description" required=""></textarea>-->
                        <select id="type_{{PREFIX}}_modal"
                            name="select" class="flex h-12 w-full rounded-lg border border-white/20 bg-white/10 backdrop-blur-sm px-4 py-3 text-sm text-white placeholder:text-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent disabled:cursor-not-allowed disabled:opacity-50 transition-all duration-200 col-span-3">
                            <option value="0" selected >
                                <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-white text-right" for="instructor">Estudiante</label>
                            </option>
                            <option value="1" >
                                <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-white text-right" for="instructor">Profesor</label>
                            </option>
                        </select>
                </div>
            </div>
            <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2">
                <button
                    id="button_save_changes_{{PREFIX}}"
                    class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2"
                    type="submit">Guardar</button>
            </div>
        </form>

        <button 
            onClick="colse_modals()"
            type="button"
            class="absolute right-4 top-4 rounded-sm opacity-70 ring-offset-background transition-opacity hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:pointer-events-none data-[state=open]:bg-accent data-[state=open]:text-muted-foreground">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                <path d="M18 6 6 18">
                </path>
                <path d="m6 6 12 12">
                </path>
            </svg>
            <span class="sr-only">Close</span>
        </button>

    </div>
</div>

"""
update_ = """<?php
	//start session
	session_start();
	header('Content-Type: application/json');	
	require("../../common/MySQLIDatabase.php");

	if (!isset($_SESSION["{{PREFIX}}_id"]) && !isset($_SESSION["email"]))
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

    $query="UPDATE {{PREFIX}}s SET {{PREFIX}}name='$name',email='$email',type=$type WHERE id=$id";
	//$response['status'] = $name.' '.$email.' '.$password.' '.$type;
    if($password != ''){
        $pass_hash = password_hash($password, PASSWORD_BCRYPT);
        $query="UPDATE {{PREFIX}}s SET {{PREFIX}}name='$name',email='$email',password='$pass_hash',type=$type WHERE id=$id";
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
"""
try:
    # Create JS file
    with open(f"_module_{prefix}s.js", "w", encoding="utf-8") as js_file:
        js_file.write(_module_.replace("{{PREFIX}}", prefix))
    # Create PHP file
    with open(f"delete_{prefix}.php", "w", encoding="utf-8") as php_file:
        php_file.write(delete_.replace("{{PREFIX}}", prefix))
    # Create PHP file
    with open(f"get_{prefix}s.php", "w", encoding="utf-8") as php_file:
        php_file.write(get_.replace("{{PREFIX}}", prefix))
    # Create PHP file
    with open(f"insert_{prefix}.php", "w", encoding="utf-8") as php_file:
        php_file.write(insert_.replace("{{PREFIX}}", prefix))
            # Create PHP file
    with open(f"modal_{prefix}.php", "w", encoding="utf-8") as php_file:
        php_file.write(modal_.replace("{{PREFIX}}", prefix))
    # Create PHP file
    with open(f"update_{prefix}.php", "w", encoding="utf-8") as php_file:
        php_file.write(update_.replace("{{PREFIX}}", prefix))
    print(f"✅ Files created successfully:\n - {f"{prefix}.php"}\n ")

except Exception as e:
    print(f"❌ Error creating files: {e}")