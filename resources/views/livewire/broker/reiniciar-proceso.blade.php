<div>
    <button type="button" class="btn btn-orange-ligth" wire:loading.attr="disabled" wire:loading.remove
        wire:click="resetProceso"><svg width="18" height="21" viewBox="0 0 18 21" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M17.3571 10.2857C17.3571 10.9965 16.7814 11.5718 16.0714 11.5718H10.2857V17.3576C10.2857 18.0683 9.70995 18.6429 9 18.6429C8.29004 18.6429 7.71428 18.0683 7.71428 17.3576V11.5718H1.92857C1.21861 11.5718 0.642853 10.9965 0.642853 10.2857C0.642853 9.57497 1.21861 9.00042 1.92857 9.00042H7.71428V3.2147C7.71428 2.50395 8.29004 1.92859 9 1.92859C9.70995 1.92859 10.2857 2.50395 10.2857 3.2147V9.00042H16.0714C16.7826 9.00002 17.3571 9.57457 17.3571 10.2857Z"
                fill="#E96235" />
        </svg> Nuevo
        contrato</button>
    <div wire:loading wire:loading.class="d-flex align-items-center" wire:target="resetProceso">
        <x-loading />
    </div>

    {{-- @if (Auth::user()->fase == 2 || (Auth::user()->fase == 0 && $verificarProceso != null) || $verificarNewUser == null)
    @else
        <button type="button" class="btn btn-dash-morado-light-sm" wire:loading.attr="disabled" wire:loading.remove
            wire:click="continueProceso">Continuar
            preceso</button>
        <div wire:loading wire:loading.class="d-flex align-items-center" wire:target="continueProceso">
            <x-loading />
        </div>
    @endif --}}

</div>
