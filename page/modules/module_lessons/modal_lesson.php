<div id="lesson_dialog" style="display: none;">

    <div data-state="open"
        class="fixed inset-0 z-50 bg-black/80 backdrop-blur-sm data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0"
        style="pointer-events: auto;" data-aria-hidden="true" aria-hidden="true"></div>
    <div role="dialog" id="radix-:r7:" aria-describedby="radix-:r9:" aria-labelledby="radix-:r8:" data-state="open"
        class="fixed left-[50%] top-[50%] z-50 grid w-full max-w-lg translate-x-[-50%] translate-y-[-50%] gap-4 border p-6 shadow-lg duration-200 data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 data-[state=closed]:slide-out-to-left-1/2 data-[state=closed]:slide-out-to-top-[48%] data-[state=open]:slide-in-from-left-1/2 data-[state=open]:slide-in-from-top-[48%] rounded-lg sm:max-w-[425px] bg-slate-900 border-slate-700 text-white"
        tabindex="-1" style="pointer-events: auto;">
        <div class="flex flex-col space-y-1.5 text-center sm:text-left">
            <h2 id="radix-:r8:" class="text-lg font-semibold leading-none tracking-tight text-white">Editar Curso</h2>
            <p id="radix-:r9:" class="text-sm text-white/70">Modifica los detalles del curso.</p>
        </div>
        <form id="save_lesson_form">
            <form>
                <div class="grid gap-4 py-4">
                    <div class="grid grid-cols-4 items-center gap-4">
                        <label
                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-white text-right"
                            for="title">Título</label>
                        <input
                            class="flex h-12 w-full rounded-lg border border-white/20 bg-white/10 backdrop-blur-sm px-4 py-3 text-sm text-white placeholder:text-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent disabled:cursor-not-allowed disabled:opacity-50 transition-all duration-200 col-span-3"
                            id="title" name="title" required="" value="Introducción a HTML y CSS">
                    </div>
                    <div class="grid grid-cols-4 items-center gap-4">
                        <label
                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-white text-right"
                            for="duration">Duración</label>
                        <input
                            class="flex h-12 w-full rounded-lg border border-white/20 bg-white/10 backdrop-blur-sm px-4 py-3 text-sm text-white placeholder:text-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent disabled:cursor-not-allowed disabled:opacity-50 transition-all duration-200 col-span-3"
                            id="duration" name="duration" required="" value="45 min">
                    </div>
                    <div class="grid grid-cols-4 items-center gap-4">
                        <label
                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-white text-right"
                            for="videoUrl">URL del Video</label>
                        <input type="url"
                            class="flex h-12 w-full rounded-lg border border-white/20 bg-white/10 backdrop-blur-sm px-4 py-3 text-sm text-white placeholder:text-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent disabled:cursor-not-allowed disabled:opacity-50 transition-all duration-200 col-span-3"
                            id="videoUrl" name="videoUrl" required="" value="https://www.youtube.com/embed/mU6anWqZJcc">
                    </div>
                    <div class="grid grid-cols-4 items-center gap-4">
                        <label
                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-white text-right"
                            for="content">Contenido</label>
                        <textarea
                            class="flex min-h-[80px] w-full rounded-lg border border-white/20 bg-white/10 px-4 py-3 text-sm text-white placeholder:text-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent disabled:cursor-not-allowed disabled:opacity-50 transition-all duration-200 col-span-3"
                            id="content" name="content"
                            required="">Conceptos básicos de HTML5 y CSS3 para estructurar y dar estilo a tus primeras páginas web.</textarea>
                    </div>
                </div>
                <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2">
                    <button
                        class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2"
                        type="submit">Guardar Cambios</button>
                </div>
            </form>
        </form>

        <button id="lesson_dialog_exit" type="button"
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