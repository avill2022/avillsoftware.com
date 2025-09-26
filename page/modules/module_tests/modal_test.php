<div id="test_dialog" style="display: none;">

    <div data-state="open"
        class="fixed inset-0 z-50 bg-black/80 backdrop-blur-sm data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0"
        style="pointer-events: auto;" data-aria-hidden="true" aria-hidden="true"></div>
    <div role="dialog" id="radix-:r2:" aria-describedby="radix-:r4:" aria-labelledby="radix-:r3:" data-state="open"
        class="fixed left-[50%] top-[50%] z-50 grid w-full translate-x-[-50%] translate-y-[-50%] gap-4 border p-6 shadow-lg duration-200 data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 data-[state=closed]:slide-out-to-left-1/2 data-[state=closed]:slide-out-to-top-[48%] data-[state=open]:slide-in-from-left-1/2 data-[state=open]:slide-in-from-top-[48%] rounded-lg max-w-3xl bg-slate-900 border-slate-700 text-white"
        tabindex="-1" style="pointer-events: auto;">
        <div class="flex flex-col space-y-1.5 text-center sm:text-left">
            <h2 id="radix-:r3:" class="text-lg font-semibold leading-none tracking-tight text-white">Crear Nuevo Test
            </h2>
            <p id="radix-:r4:" class="text-sm text-white/70">Construye tu test añadiendo y configurando preguntas.</p>
        </div>
        <div class="space-y-4 max-h-[70vh] overflow-y-auto p-1">
            <div>
                <label
                    class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-white"
                    for="test-title">Título del Test</label>
                <input
                    class="flex h-12 w-full rounded-lg border border-white/20 bg-white/10 backdrop-blur-sm px-4 py-3 text-sm text-white placeholder:text-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent disabled:cursor-not-allowed disabled:opacity-50 transition-all duration-200"
                    id="test-title" placeholder="Ej: Test de Fundamentos de React" value="">
            </div>
            <div id="questions_modal_test"></div>
            
            
            
           
            <button
                id="insert_questions"
                class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="mr-2 h-4 w-4">
                    <circle cx="12" cy="12" r="10">

                    </circle>
                    <path d="M8 12h8">

                    </path>
                    <path d="M12 8v8">

                    </path>
                </svg>Añadir Pregunta</button>
        </div>
        <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2">
            <button
                class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2">Cancelar</button>
            <button
                class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2">Guardar
                Test</button>
        </div>
        <button id="test_dialog_exit" type="button"
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