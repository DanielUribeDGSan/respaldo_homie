<div>
    @if ((Auth::user()->transaction == $transaction && Auth::user()->fase < 2) || (!is_null($fase) && $fase < 2))
        <button type="button" class="btn btn-dash-morado mt-4 mb-4" wire:loading.attr="disabled" wire:loading.remove
            wire:click="continueProceso('{{ $transaction }}')">Completar
            proceso</button>
        <div wire:loading wire:loading.class="d-flex align-items-center"
            wire:target="continueProceso('{{ $transaction }}')">
            <x-loading />
        </div>
    @endif


</div>
