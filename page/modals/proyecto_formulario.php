<?php
/*include('common/connect.php');
$result = mysqli_query($dbh, "SELECT * FROM `depto`;");
$total = mysqli_num_rows($result);

$deptos = '
  <select id="depto_usuario">
  ';

if ($result) {
  if ($total > 0) {
    while ($ren = mysqli_fetch_array($result)) {
      $deptos .= '<option value="' . $ren['nombre'] . '">' . $ren['nombre'] . '</option>';
    }
  }
}
$deptos .= '</select>';
mysqli_close($dbh);*/
?>


<div role="dialog" id="radix" aria-describedby="radix-:r3:" aria-labelledby="radix-:r2:" data-state="open"
  class="fixed left-[50%] top-[50%] z-50 grid w-full max-w-lg translate-x-[-50%] translate-y-[-50%] gap-4 border bg-background p-6 shadow-lg duration-200 data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 data-[state=closed]:slide-out-to-left-1/2 data-[state=closed]:slide-out-to-top-[48%] data-[state=open]:slide-in-from-left-1/2 data-[state=open]:slide-in-from-top-[48%] sm:rounded-lg dark:bg-slate-900 dark:border-slate-800 sm:max-w-[425px] glass-effect text-white border-slate-700"
  tabindex="-1" style="pointer-events: auto; display: none;">
  <div class="flex flex-col space-y-1.5 text-center sm:text-left">
    <h2 id="radix-:r2:" class="font-semibold tracking-tight dark:text-white gradient-text text-2xl">Comenzar un Nuevo
      Proyecto</h2>
    <p id="radix-:r3:" class="text-sm dark:text-slate-400 text-slate-400">Cuéntanos sobre tu idea y te ayudaremos a
      hacerla realidad.</p>
  </div>
  <form class="grid gap-4 py-4" id="enviar_mensaje">
    <div class="grid grid-cols-4 items-center gap-4">
      <label
        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 dark:text-gray-300 text-right text-slate-300"
        for="name">Nombre</label>
      <input 
        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 dark:bg-slate-800 dark:border-slate-600 dark:text-white dark:placeholder:text-slate-400 dark:focus-visible:ring-blue-500 col-span-3"
        id="name" placeholder="Tu nombre completo" required="" value="">
    </div>
    <div class="grid grid-cols-4 items-center gap-4">
      <label
        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 dark:text-gray-300 text-right text-slate-300"
        for="email">Email</label>
      <input type="email"
        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 dark:bg-slate-800 dark:border-slate-600 dark:text-white dark:placeholder:text-slate-400 dark:focus-visible:ring-blue-500 col-span-3"
        id="email" placeholder="tu@email.com" required="" value="">
    </div>
    <div class="grid grid-cols-4 items-center gap-4">
      <label
        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 dark:text-gray-300 text-right text-slate-300"
        for="company">Empresa</label>
      <input
        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 dark:bg-slate-800 dark:border-slate-600 dark:text-white dark:placeholder:text-slate-400 dark:focus-visible:ring-blue-500 col-span-3"
        id="company" placeholder="Nombre de tu empresa" value="">
    </div>
    <div class="grid grid-cols-4 items-center gap-4">
      <label
        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 dark:text-gray-300 text-right text-slate-300"
        for="projectDescription">Descripción</label>
      <textarea id="projectDescription" placeholder="Describe tu proyecto..."
        class="col-span-3 w-full px-3 py-2 bg-slate-800 border border-slate-600 rounded-md text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent min-h-[100px]"
        rows="3" required="">

  </textarea>
    </div>
    <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2">
      <button id="enviar_propuesta"
        class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 gradient-bg w-full sm:w-auto"
        type="submit">Enviar Solicitud <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round" class="ml-2 h-4 w-4">
          <path d="M5 12h14">

          </path>
          <path d="m12 5 7 7-7 7">

          </path>
        </svg>
      </button>
    </div>
  </form>
  <button type="button" id="dialog_button"
    class="absolute right-4 top-4 rounded-sm opacity-70 ring-offset-background transition-opacity hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:pointer-events-none data-[state=open]:bg-accent data-[state=open]:text-muted-foreground">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
      stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
      <path d="M18 6 6 18">

      </path>
      <path d="m6 6 12 12">

      </path>
    </svg>
    <span class="sr-only">Close</span>
  </button>
</div>