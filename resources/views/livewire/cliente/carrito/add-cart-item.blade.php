<div x-data>
    <div class="flex">
        <div>{{--para asignacion de cantidad--}}


            <x-jet-secondary-button 
              disabled
              x-bind:disabled="$wire.qty <= 1"
              wire:loading.attr="disabled"
              wire:target="decrement"
              wire:click="decrement">
                -
            </x-jet-secondary-button>


            <span class="mx-2 text-slate-600">{{$qty}}</span>
            <x-jet-secondary-button 
              disabled
              x-bind:disabled="($wire.qty -1) == $wire.precio || $wire.qty >=15" {{--Se desactiva si el precio es 0, solo acepta 15 entradas--}}
              wire:loading.attr="disabled"
              wire:target="increment"
              wire:click="increment"> 
                +
            </x-jet-secondary-button>
        </div>
        <div class="flex-1">
            <x-jet-button class="ml-3 w-full justify-center">
                Agregar al paquete
            </x-jet-button>
        </div>
    </div>
</div>
