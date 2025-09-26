<?php
 //onload="javascript:ploading('header')"
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

?>
<?php 
$d=date("d")-1;
$m=date("m");
$Y=date("Y");

?>
<header class="fixed top-0 w-full z-50 glass-effect" style="opacity: 1; transform: none;">
			<nav class="container mx-auto px-6 py-4">
			<div class="flex items-center justify-between">
			<div class="text-2xl font-bold gradient-text">Avill</div>
		<div class="hidden md:flex space-x-8">
			<a href="#servicios" class="text-white hover:text-blue-400 transition-colors" id="nav_our_services">Servicios</a>
		<a href="#nosotros" class="text-white hover:text-blue-400 transition-colors" id="nav_we">Nosotros</a>
		<a href="#contacto" class="text-white hover:text-blue-400 transition-colors" id="nav_contact">Contacto</a>
	</div>
		<button id="consulta_gratis" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 gradient-bg hover:scale-105 transition-transform">Consulta Gratis</button>
	</div>
	</nav>
	</header>