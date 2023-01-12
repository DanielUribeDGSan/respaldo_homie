<div x-data>
    @if ((Auth::user()->type == 'broker' && Auth::user()->fase == 2) || (Auth::user()->type == 'broker' && Auth::user()->fase == 0 && $verificarProceso != null) || $verificarNewUser == null)
        <button type="button" class="btn bbtn btn-yellow-menu" wire:loading.attr="disabled" wire:loading.remove
            wire:click="resetProceso">
            Nuevo
            contrato</button>
        <div wire:loading wire:loading.class="d-flex align-items-center" wire:target="resetProceso">
            <p class="parpadea text-secundary"><small>Creando contrato</small></p>
        </div>
    @elseif (Auth::user()->type == 'broker' && Auth::user()->fase < 2 || Auth::user()->type == 'propietario' &&
            Auth::user()->fase < 2 || Auth::user()->type == 'inquilino' &&
                Auth::user()->fase < 4) @if (Route::current()->getName() == 'home' || Route::current()->getName() == 'preguntas_respuestas' || Route::current()->getName() == 'preguntas_respuestas')
                    <button type="button" class="btn btn-yellow-menu-2" wire:loading.attr="disabled" wire:loading.remove
                        wire:click="continueProceso">Continuar
                        proceso</button>
                    <div wire:loading wire:loading.class="d-flex align-items-center" wire:target="continueProceso">
                        <p class="parpadea text-secundary"><small>Continuando proceso</small></p>

                    </div>
    @endif

    @endif

</div>
