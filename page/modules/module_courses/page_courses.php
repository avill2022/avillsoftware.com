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
	
	$response=array('status' => 'ERROR');
    $response['status']='OK';
	$response['tabla'] = '<div class="space-y-8" style="opacity: 1; transform: none;">
					<div class="flex items-center justify-between">
						<h2 class="text-3xl font-bold text-white">Mis Cursos</h2>
						<button
							class="inline-flex items-center justify-center rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary hover:bg-primary/90 h-10 px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold">Explorar
							Cursos</button>
					</div>
					<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
						<div style="opacity: 1; transform: none;">
							<div
								class="rounded-xl border bg-white/10 backdrop-blur-xl text-white shadow-xl glass-effect border-white/30 card-hover h-full flex flex-col">
								<div class="relative">
									<img class="w-full h-48 object-cover rounded-t-xl"
										alt="Modern web development code on screen"
										src="https://images.unsplash.com/photo-1635251595512-dc52146d5ae8">
									<div
										class="absolute top-4 right-4 bg-black/50 backdrop-blur-sm rounded-full px-3 py-1">
										<span class="text-white text-sm font-medium">75%</span>
									</div>
								</div>
								<div class="p-6 flex flex-col flex-grow">
									<h3 class="font-bold text-white text-lg mb-2">Desarrollo Web Moderno</h3>
									<p class="text-white/70 text-sm mb-4">Dr. María González</p>
									<div class="flex items-center justify-between text-sm text-white/80 mb-4">
										<span class="flex items-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
												stroke-linecap="round" stroke-linejoin="round"
												class="h-4 w-4 text-yellow-400 fill-current mr-1.5">
												<polygon
													points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
												</polygon>
											</svg> 4.8</span>
										<span class="flex items-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
												stroke-linecap="round" stroke-linejoin="round"
												class="h-4 w-4 text-white/60 mr-1.5">
												<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2">
												</path>
												<circle cx="9" cy="7" r="4">
												</circle>
												<path d="M22 21v-2a4 4 0 0 0-3-3.87">
												</path>
												<path d="M16 3.13a4 4 0 0 1 0 7.75">
												</path>
											</svg> 1234</span>
										<span>8 semanas</span>
									</div>
									<div class="w-full bg-white/20 rounded-full h-2.5 mb-4">
										<div class="bg-gradient-to-r from-blue-500 to-purple-600 h-2.5 rounded-full"
											style="width: 75%;">
										</div>
									</div>
									<a class="w-full mt-auto" href="/course/1">
										<button
											class="inline-flex items-center justify-center rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary hover:bg-primary/90 h-10 px-4 py-2 w-full bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold">Continuar
											Curso</button>
									</a>
								</div>
							</div>
						</div>
						<div style="opacity: 1; transform: none;">
							<div
								class="rounded-xl border bg-white/10 backdrop-blur-xl text-white shadow-xl glass-effect border-white/30 card-hover h-full flex flex-col">
								<div class="relative">
									<img class="w-full h-48 object-cover rounded-t-xl"
										alt="Futuristic AI robot with circuits"
										src="https://images.unsplash.com/photo-1635251595512-dc52146d5ae8">
									<div
										class="absolute top-4 right-4 bg-black/50 backdrop-blur-sm rounded-full px-3 py-1">
										<span class="text-white text-sm font-medium">45%</span>
									</div>
								</div>
								<div class="p-6 flex flex-col flex-grow">
									<h3 class="font-bold text-white text-lg mb-2">Inteligencia Artificial</h3>
									<p class="text-white/70 text-sm mb-4">Prof. Carlos Ruiz</p>
									<div class="flex items-center justify-between text-sm text-white/80 mb-4">
										<span class="flex items-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
												stroke-linecap="round" stroke-linejoin="round"
												class="h-4 w-4 text-yellow-400 fill-current mr-1.5">
												<polygon
													points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
												</polygon>
											</svg> 4.9</span>
										<span class="flex items-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
												stroke-linecap="round" stroke-linejoin="round"
												class="h-4 w-4 text-white/60 mr-1.5">
												<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2">
												</path>
												<circle cx="9" cy="7" r="4">
												</circle>
												<path d="M22 21v-2a4 4 0 0 0-3-3.87">
												</path>
												<path d="M16 3.13a4 4 0 0 1 0 7.75">
												</path>
											</svg> 856</span>
										<span>12 semanas</span>
									</div>
									<div class="w-full bg-white/20 rounded-full h-2.5 mb-4">
										<div class="bg-gradient-to-r from-blue-500 to-purple-600 h-2.5 rounded-full"
											style="width: 45%;">
										</div>
									</div>
									<a class="w-full mt-auto" href="/course/2">
										<button
											class="inline-flex items-center justify-center rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary hover:bg-primary/90 h-10 px-4 py-2 w-full bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold">Continuar
											Curso</button>
									</a>
								</div>
							</div>
						</div>
						<div style="opacity: 1; transform: none;">
							<div
								class="rounded-xl border bg-white/10 backdrop-blur-xl text-white shadow-xl glass-effect border-white/30 card-hover h-full flex flex-col">
								<div class="relative">
									<img class="w-full h-48 object-cover rounded-t-xl"
										alt="Designer creating user interfaces"
										src="https://images.unsplash.com/photo-1635251595512-dc52146d5ae8">
									<div
										class="absolute top-4 right-4 bg-black/50 backdrop-blur-sm rounded-full px-3 py-1">
										<span class="text-white text-sm font-medium">90%</span>
									</div>
								</div>
								<div class="p-6 flex flex-col flex-grow">
									<h3 class="font-bold text-white text-lg mb-2">Diseño UX/UI Avanzado</h3>
									<p class="text-white/70 text-sm mb-4">Ana Martínez</p>
									<div class="flex items-center justify-between text-sm text-white/80 mb-4">
										<span class="flex items-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
												stroke-linecap="round" stroke-linejoin="round"
												class="h-4 w-4 text-yellow-400 fill-current mr-1.5">
												<polygon
													points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
												</polygon>
											</svg> 4.7</span>
										<span class="flex items-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
												stroke-linecap="round" stroke-linejoin="round"
												class="h-4 w-4 text-white/60 mr-1.5">
												<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2">
												</path>
												<circle cx="9" cy="7" r="4">
												</circle>
												<path d="M22 21v-2a4 4 0 0 0-3-3.87">
												</path>
												<path d="M16 3.13a4 4 0 0 1 0 7.75">
												</path>
											</svg> 2341</span>
										<span>6 semanas</span>
									</div>
									<div class="w-full bg-white/20 rounded-full h-2.5 mb-4">
										<div class="bg-gradient-to-r from-blue-500 to-purple-600 h-2.5 rounded-full"
											style="width: 90%;">
										</div>
									</div>
									<a class="w-full mt-auto" href="/course/3">
										<button
											class="inline-flex items-center justify-center rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary hover:bg-primary/90 h-10 px-4 py-2 w-full bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold">Continuar
											Curso</button>
									</a>
								</div>
							</div>
						</div>
						<div style="opacity: 1; transform: none;">
							<div
								class="rounded-xl border bg-white/10 backdrop-blur-xl text-white shadow-xl glass-effect border-white/30 card-hover h-full flex flex-col">
								<div class="relative">
									<img class="w-full h-48 object-cover rounded-t-xl" alt="Database structure diagram"
										src="https://images.unsplash.com/photo-1635251595512-dc52146d5ae8">
									<div
										class="absolute top-4 right-4 bg-black/50 backdrop-blur-sm rounded-full px-3 py-1">
										<span class="text-white text-sm font-medium">60%</span>
									</div>
								</div>
								<div class="p-6 flex flex-col flex-grow">
									<h3 class="font-bold text-white text-lg mb-2">Bases de Datos SQL y NoSQL</h3>
									<p class="text-white/70 text-sm mb-4">Luis Fernández</p>
									<div class="flex items-center justify-between text-sm text-white/80 mb-4">
										<span class="flex items-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
												stroke-linecap="round" stroke-linejoin="round"
												class="h-4 w-4 text-yellow-400 fill-current mr-1.5">
												<polygon
													points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
												</polygon>
											</svg> 4.8</span>
										<span class="flex items-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
												stroke-linecap="round" stroke-linejoin="round"
												class="h-4 w-4 text-white/60 mr-1.5">
												<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2">
												</path>
												<circle cx="9" cy="7" r="4">
												</circle>
												<path d="M22 21v-2a4 4 0 0 0-3-3.87">
												</path>
												<path d="M16 3.13a4 4 0 0 1 0 7.75">
												</path>
											</svg> 975</span>
										<span>10 semanas</span>
									</div>
									<div class="w-full bg-white/20 rounded-full h-2.5 mb-4">
										<div class="bg-gradient-to-r from-blue-500 to-purple-600 h-2.5 rounded-full"
											style="width: 60%;">
										</div>
									</div>
									<a class="w-full mt-auto" href="/course/4">
										<button
											class="inline-flex items-center justify-center rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary hover:bg-primary/90 h-10 px-4 py-2 w-full bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold">Continuar
											Curso</button>
									</a>
								</div>
							</div>
						</div>
						<div style="opacity: 1; transform: none;">
							<div
								class="rounded-xl border bg-white/10 backdrop-blur-xl text-white shadow-xl glass-effect border-white/30 card-hover h-full flex flex-col">
								<div class="relative">
									<img class="w-full h-48 object-cover rounded-t-xl"
										alt="Digital marketing campaign dashboard"
										src="https://images.unsplash.com/photo-1635251595512-dc52146d5ae8">
									<div
										class="absolute top-4 right-4 bg-black/50 backdrop-blur-sm rounded-full px-3 py-1">
										<span class="text-white text-sm font-medium">25%</span>
									</div>
								</div>
								<div class="p-6 flex flex-col flex-grow">
									<h3 class="font-bold text-white text-lg mb-2">Marketing Digital Esencial</h3>
									<p class="text-white/70 text-sm mb-4">Sofía Gómez</p>
									<div class="flex items-center justify-between text-sm text-white/80 mb-4">
										<span class="flex items-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
												stroke-linecap="round" stroke-linejoin="round"
												class="h-4 w-4 text-yellow-400 fill-current mr-1.5">
												<polygon
													points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
												</polygon>
											</svg> 4.6</span>
										<span class="flex items-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
												stroke-linecap="round" stroke-linejoin="round"
												class="h-4 w-4 text-white/60 mr-1.5">
												<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2">
												</path>
												<circle cx="9" cy="7" r="4">
												</circle>
												<path d="M22 21v-2a4 4 0 0 0-3-3.87">
												</path>
												<path d="M16 3.13a4 4 0 0 1 0 7.75">
												</path>
											</svg> 3120</span>
										<span>8 semanas</span>
									</div>
									<div class="w-full bg-white/20 rounded-full h-2.5 mb-4">
										<div class="bg-gradient-to-r from-blue-500 to-purple-600 h-2.5 rounded-full"
											style="width: 25%;">
										</div>
									</div>
									<a class="w-full mt-auto" href="/course/5">
										<button
											class="inline-flex items-center justify-center rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary hover:bg-primary/90 h-10 px-4 py-2 w-full bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold">Continuar
											Curso</button>
									</a>
								</div>
							</div>
						</div>
						<div style="opacity: 1; transform: none;">
							<div
								class="rounded-xl border bg-white/10 backdrop-blur-xl text-white shadow-xl glass-effect border-white/30 card-hover h-full flex flex-col">
								<div class="relative">
									<img class="w-full h-48 object-cover rounded-t-xl"
										alt="Agile board with sticky notes"
										src="https://images.unsplash.com/photo-1635251595512-dc52146d5ae8">
									<div
										class="absolute top-4 right-4 bg-black/50 backdrop-blur-sm rounded-full px-3 py-1">
										<span class="text-white text-sm font-medium">80%</span>
									</div>
								</div>
								<div class="p-6 flex flex-col flex-grow">
									<h3 class="font-bold text-white text-lg mb-2">Gestión de Proyectos con Agile</h3>
									<p class="text-white/70 text-sm mb-4">Javier Torres</p>
									<div class="flex items-center justify-between text-sm text-white/80 mb-4">
										<span class="flex items-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
												stroke-linecap="round" stroke-linejoin="round"
												class="h-4 w-4 text-yellow-400 fill-current mr-1.5">
												<polygon
													points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
												</polygon>
											</svg> 4.9</span>
										<span class="flex items-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
												stroke-linecap="round" stroke-linejoin="round"
												class="h-4 w-4 text-white/60 mr-1.5">
												<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2">
												</path>
												<circle cx="9" cy="7" r="4">
												</circle>
												<path d="M22 21v-2a4 4 0 0 0-3-3.87">
												</path>
												<path d="M16 3.13a4 4 0 0 1 0 7.75">
												</path>
											</svg> 1543</span>
										<span>5 semanas</span>
									</div>
									<div class="w-full bg-white/20 rounded-full h-2.5 mb-4">
										<div class="bg-gradient-to-r from-blue-500 to-purple-600 h-2.5 rounded-full"
											style="width: 80%;">
										</div>
									</div>
									<a class="w-full mt-auto" href="/course/6">
										<button
											class="inline-flex items-center justify-center rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary hover:bg-primary/90 h-10 px-4 py-2 w-full bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold">Continuar
											Curso</button>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>';

	/*function get_item($id,$coursename,$description,$instructor,$type):string{
		return '';
	}*/

	/*try{
		$result=mysqli_query($dbh, "select * from courses;");
		$total=mysqli_num_rows($result);
		
		if ($result){
			if ($total>0){
				$content_table='';
				while ($ren=mysqli_fetch_array($result)){
					$content_table.= get_item($ren['id'],$ren['title'],$ren['description'],$ren['instructor'],$ren['type']);
				}
			}
			else{
				$content_table='</tr>';
				$content_table.='<tr>';
				$content_table.='<td colspan="6">No existen registros...</td>';
				$content_table.='</tr>';
			}
			$table='';
			$response['status']='OK';
			$response['tabla']=$table;
		}	
		mysqli_close($dbh);		
	}catch(Exception $e){
		$response['status'] = "'$e'";
	}*/
	echo json_encode($response);
?>

