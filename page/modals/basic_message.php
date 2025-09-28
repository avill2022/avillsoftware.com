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


<div role="dialog" id="basic_message" aria-describedby="basic_message-:r3:" aria-labelledby="basic_message" data-state="open"
  class="fixed left-[50%] top-[50%] z-50 grid w-full max-w-lg translate-x-[-50%] translate-y-[-50%] gap-4 border bg-background p-6 shadow-lg duration-200 data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 data-[state=closed]:slide-out-to-left-1/2 data-[state=closed]:slide-out-to-top-[48%] data-[state=open]:slide-in-from-left-1/2 data-[state=open]:slide-in-from-top-[48%] sm:rounded-lg dark:bg-slate-900 dark:border-slate-800 sm:max-w-[425px] glass-effect text-white border-slate-700"
  tabindex="-1" style="pointer-events: auto; display: none;">
  <div class="flex flex-col space-y-1.5 text-center sm:text-left">
    <h2 id="basic_message_title" class="font-semibold tracking-tight dark:text-white gradient-text text-2xl">Comenzar un Nuevo
      Proyecto</h2>
    <p id="basic_message_text" class="text-sm dark:text-slate-400 text-slate-400">Cuéntanos sobre tu idea y te ayudaremos a
      hacerla realidad.</p>
  </div>

  <button type="button" id="basic_message_close"
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