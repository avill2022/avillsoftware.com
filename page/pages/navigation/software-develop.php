<?php
	//start session
	$response=array('status' => 'ERROR');
    $response['status']='OK';
	$response['tabla'] = '
	<div class="pt-24 pb-16 px-6"
				style="opacity: 0.999512; transform: translateX(0.0488281px) translateZ(0px);">
				<div class="container mx-auto">
					<a id="get_back"
						class="text-white hover:text-blue-400 transition-colors"
						><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
							fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
							stroke-linejoin="round"
							class="mr-2 h-5 w-5 group-hover:-translate-x-1 transition-transform">
							<path d="m12 19-7-7 7-7"></path>
							<path d="M19 12H5"></path>
						</svg>Volver a Inicio
						</a>
					<div style="opacity: 1; transform: none;">
						<h1 class="text-5xl md:text-6xl font-bold mb-6 text-white">Desarrollo de <span
								class="gradient-text">Software a Medida</span></h1>
						<p class="text-xl md:text-2xl text-gray-300 mb-12 max-w-3xl">Transformamos tus ideas en
							soluciones de software robustas, escalables y eficientes. Creamos aplicaciones web y móviles
							personalizadas que impulsan el crecimiento de tu empresa.</p>
					</div>
					<div class="grid md:grid-cols-2 gap-12 mb-16 items-center">
						<div style="opacity: 1; transform: none;">
							<h2 class="text-3xl font-bold mb-6 text-white">Nuestra <span
									class="gradient-text">Especialización</span></h2>
							<ul class="space-y-4 text-lg text-gray-300">
								<li class="flex items-start"><svg xmlns="http://www.w3.org/2000/svg" width="24"
										height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
										stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
										class="h-6 w-6 text-green-400 mr-3 mt-1 flex-shrink-0">
										<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
										<polyline points="22 4 12 14.01 9 11.01"></polyline>
									</svg><span>Aplicaciones Web Progresivas (PWA) y Tradicionales.</span></li>
								<li class="flex items-start"><svg xmlns="http://www.w3.org/2000/svg" width="24"
										height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
										stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
										class="h-6 w-6 text-green-400 mr-3 mt-1 flex-shrink-0">
										<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
										<polyline points="22 4 12 14.01 9 11.01"></polyline>
									</svg><span>Desarrollo de Aplicaciones Móviles Nativas e Híbridas.</span></li>
								<li class="flex items-start"><svg xmlns="http://www.w3.org/2000/svg" width="24"
										height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
										stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
										class="h-6 w-6 text-green-400 mr-3 mt-1 flex-shrink-0">
										<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
										<polyline points="22 4 12 14.01 9 11.01"></polyline>
									</svg><span>Integración de Sistemas y APIs.</span></li>
								<li class="flex items-start"><svg xmlns="http://www.w3.org/2000/svg" width="24"
										height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
										stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
										class="h-6 w-6 text-green-400 mr-3 mt-1 flex-shrink-0">
										<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
										<polyline points="22 4 12 14.01 9 11.01"></polyline>
									</svg><span>Soluciones E-commerce y Plataformas de Gestión.</span></li>
								<li class="flex items-start"><svg xmlns="http://www.w3.org/2000/svg" width="24"
										height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
										stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
										class="h-6 w-6 text-green-400 mr-3 mt-1 flex-shrink-0">
										<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
										<polyline points="22 4 12 14.01 9 11.01"></polyline>
									</svg><span>Modernización de Aplicaciones Legacy.</span></li>
							</ul>
						</div>
						<div class="glass-effect p-8 rounded-xl" style="opacity: 1; transform: none;">
							<h3 class="text-2xl font-bold mb-6 text-white text-center">Tecnologías que<span
									class="gradient-text">Dominamos</span></h3>
							<div class="grid grid-cols-2 sm:grid-cols-3 gap-6">
								<div
									class="flex flex-col items-center p-3 bg-slate-800/50 rounded-lg hover:bg-slate-700/50 transition-colors">
									<img alt="React logo" class="h-8 w-8"
										src=""><span
										class="mt-2 text-sm text-gray-300">React</span></div>
								<div
									class="flex flex-col items-center p-3 bg-slate-800/50 rounded-lg hover:bg-slate-700/50 transition-colors">
									<img alt="Node.js logo" class="h-8 w-8"
										src=""><span
										class="mt-2 text-sm text-gray-300">Node.js</span></div>
								<div
									class="flex flex-col items-center p-3 bg-slate-800/50 rounded-lg hover:bg-slate-700/50 transition-colors">
									<img alt="Python logo" class="h-8 w-8"
										src=""><span
										class="mt-2 text-sm text-gray-300">Python</span></div>
								<div
									class="flex flex-col items-center p-3 bg-slate-800/50 rounded-lg hover:bg-slate-700/50 transition-colors">
									<img alt="JavaScript logo" class="h-8 w-8"
										src=""><span
										class="mt-2 text-sm text-gray-300">JavaScript</span></div>
								<div
									class="flex flex-col items-center p-3 bg-slate-800/50 rounded-lg hover:bg-slate-700/50 transition-colors">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
										fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
										stroke-linejoin="round" class="h-8 w-8 text-blue-400">
										<ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
										<path d="M3 5V19A9 3 0 0 0 21 19V5"></path>
										<path d="M3 12A9 3 0 0 0 21 12"></path>
									</svg><span class="mt-2 text-sm text-gray-300">SQL/NoSQL</span></div>
								<div
									class="flex flex-col items-center p-3 bg-slate-800/50 rounded-lg hover:bg-slate-700/50 transition-colors">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
										fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
										stroke-linejoin="round" class="h-8 w-8 text-sky-400">
										<path d="M17.5 19H9a7 7 0 1 1 6.71-9h1.79a4.5 4.5 0 1 1 0 9Z"></path>
									</svg><span class="mt-2 text-sm text-gray-300">Cloud (AWS/Azure/GCP)</span></div>
							</div>
						</div>
					</div>




					<div class="mb-16" style="opacity: 100; transform: none;">
						<h2 class="text-3xl font-bold mb-8 text-white text-center">Nuestro Proceso de <span
								class="gradient-text">Desarrollo</span></h2>
						<div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-6">
							<div class="glass-effect p-6 rounded-xl text-center flex flex-col items-center"
								style="opacity: 1; transform: none;">
								<div
									class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mb-4 text-white font-bold text-xl">
									1</div>
								<h4 class="text-lg font-semibold mb-2 text-white">Consulta y Planificación</h4>
								<p class="text-sm text-gray-400">Entendemos tus necesidades y definimos el alcance del
									proyecto.</p>
							</div>
							<div class="glass-effect p-6 rounded-xl text-center flex flex-col items-center"
								style="opacity: 1; transform: none;">
								<div
									class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mb-4 text-white font-bold text-xl">
									2</div>
								<h4 class="text-lg font-semibold mb-2 text-white">Diseño UI/UX</h4>
								<p class="text-sm text-gray-400">Creamos interfaces intuitivas y atractivas centradas en
									el usuario.</p>
							</div>
							<div class="glass-effect p-6 rounded-xl text-center flex flex-col items-center"
								style="opacity: 1; transform: none;">
								<div
									class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mb-4 text-white font-bold text-xl">
									3</div>
								<h4 class="text-lg font-semibold mb-2 text-white">Desarrollo Ágil</h4>
								<p class="text-sm text-gray-400">Construimos tu software en sprints, permitiendo
									flexibilidad y feedback continuo.</p>
							</div>
							<div class="glass-effect p-6 rounded-xl text-center flex flex-col items-center"
								style="opacity: 1; transform: none;">
								<div
									class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mb-4 text-white font-bold text-xl">
									4</div>
								<h4 class="text-lg font-semibold mb-2 text-white">Pruebas Rigurosas</h4>
								<p class="text-sm text-gray-400">Aseguramos la calidad y el rendimiento a través de
									pruebas exhaustivas.</p>
							</div>
							<div class="glass-effect p-6 rounded-xl text-center flex flex-col items-center"
								style="opacity: 1; transform: none;">
								<div
									class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mb-4 text-white font-bold text-xl">
									5</div>
								<h4 class="text-lg font-semibold mb-2 text-white">Despliegue y Soporte</h4>
								<p class="text-sm text-gray-400">Lanzamos tu aplicación y ofrecemos soporte
									post-lanzamiento.</p>
							</div>
						</div>
					</div>







					<div class="text-center" style="opacity: 100; transform: none;">
						<h2 class="text-3xl font-bold mb-6 text-white">¿Listo para <span
								class="gradient-text">Comenzar</span>?</h2>
						<p class="text-lg text-gray-300 mb-8 max-w-xl mx-auto">Hablemos sobre tu proyecto. Ofrecemos una
							consulta gratuita para entender tus necesidades y proponerte la mejor solución.</p><button
							class="inline-flex items-center justify-center font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-11 rounded-md gradient-bg text-lg px-8 py-4 pulse-glow"><svg
								xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
								fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round" class="mr-2 h-5 w-5">
								<path
									d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z">
								</path>
								<path
									d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z">
								</path>
								<path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path>
								<path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path>
							</svg>Iniciar mi Proyecto de Software</button>
					</div>
				</div>
			</div>
	';


	echo json_encode($response);
?>
