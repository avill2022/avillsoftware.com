<?php
	//start session
	session_start();
	header('Content-Type: application/json');
	require("../../common/MySQLIDatabase.php");

	if (!isset($_SESSION["lesson_id"]) && !isset($_SESSION["email"]))
		echo json_encode(array('status' => 'SESSION ERROR'));
	
	if ($mysqli->connect_error) {
    	echo json_encode(["status" => "ERROR", "message" => "DB connection failed"]);
    	exit;
	}
	
	$response=array('status' => 'ERROR');
	

	function get_item($id,$lessonname,$email,$created_at,$type):string{
		return '<tr class="border-b border-white/10 hover:bg-white/5 transition-colors">
							<td class="p-4">'.$id.'</td>
                            <td class="p-4">'.$lessonname.'</td>
                            <td class="p-4 text-white/70">'.$email.'</td>
                            <td class="p-4 text-white/70">'.$created_at.'</td>
							<td class="p-4 text-white/70">'.$type.'</td>
                            <td class="p-4 text-right">
							    <button
									onclick="javascript:toggle_menu_lesson(menu_lesson'.$id.')"
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
											id="menu_lesson'.$id.'"
											data-radix-popper-content-wrapper="" dir="ltr"
											style="display:none; position: absolute; min-width: max-content; z-index: 50; --radix-popper-available-width: 1875px; --radix-popper-available-height: 362px; --radix-popper-anchor-width: 40px; --radix-popper-anchor-height: 40px; --radix-popper-transform-origin: 50% 0px;">
											<div data-side="bottom" data-align="center" role="menu" aria-orientation="vertical" data-state="open"
												data-radix-menu-content="" dir="ltr" id="radix-:r2i:" aria-labelledby="radix-:r2h:"
												class="z-50 min-w-[8rem] overflow-hidden rounded-md border border-slate-700 bg-slate-900 p-1 text-white shadow-md animate-in data-[side=bottom]:slide-in-from-top-2 data-[side=left]:slide-in-from-right-2 data-[side=right]:slide-in-from-left-2 data-[side=top]:slide-in-from-bottom-2"
												tabindex="-1" data-orientation="vertical"
												style="outline: none; --radix-dropdown-menu-content-transform-origin: var(--radix-popper-transform-origin); --radix-dropdown-menu-content-available-width: var(--radix-popper-available-width); --radix-dropdown-menu-content-available-height: var(--radix-popper-available-height); --radix-dropdown-menu-trigger-width: var(--radix-popper-anchor-width); --radix-dropdown-menu-trigger-height: var(--radix-popper-anchor-height); pointer-events: auto;">
												<div 
													id="edit_lesson'.$id.'"
													onclick="javascript:modal_edit_lesson('. $id .','.'\'' . addslashes($lessonname) .'\','.'\'' . addslashes($email) .'\','. $type .',\'' . addslashes($created_at) .'\')"
													role="menuitem"
													class="relative flex select-none items-center rounded-sm px-2 py-1.5 text-sm outline-none transition-colors focus:bg-slate-800 focus:text-white data-[disabled]:pointer-events-none data-[disabled]:opacity-50 cursor-pointer hover:!bg-slate-700"
													tabindex="-1" data-orientation="vertical" data-radix-collection-item="">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 h-4 w-4">
														<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.12 2.12 0 0 1 3 3L12 15l-4 1 1-4Z"></path>
													</svg>
													<span>Editar</span>
												</div>
												<div id="delete_lesson'.$id.'"
													onclick="javascript:delete_lesson('.$id.')"
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
		$result=mysqli_query($dbh, "select * from lessons;");
		$total=mysqli_num_rows($result);
		
		if ($result){
			if ($total>0){
				$content_table='';
				while ($ren=mysqli_fetch_array($result)){
					$content_table.= get_item($ren['id'],$ren['course_id'],$ren['title'],$ren['created_at'],-1);
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
						id="modal_lesson"
						onClick="javascript:modal_insert_lesson()"
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

