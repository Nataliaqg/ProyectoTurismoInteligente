<div x-data> {{--aplicamos funcionalidades de Alpine--}}
    
    @if($precio > 0)
     <p class="text-red-500 mb-4">
        <span class="font-semibold text-lg">Puede adquirir hasta: {{$quantity}} entradas</span>
     </p>
    @else 
    <p class="text-red-500 mb-4">
        <span class="font-semibold text-lg">Agregar lugar turístico como lista de deseos</span>
     </p>
    @endif
    
    <div class="flex">
        <div> {{--para asignacion de cantidad--}}
            <x-jet-secondary-button {{--boton de menos--}}
              disabled
              x-bind:disabled="$wire.qty <= 1"  {{--accede al valor de la propiedad del componente--}}
              wire:loading.attr="disabled"  
              wire:target="decrement"
              wire:click="decrement">
                -
            </x-jet-secondary-button>
            <span class="mx-2 text-slate-600">{{$qty}}</span>
            <x-jet-secondary-button {{--boton de mas--}}
              disabled
              x-bind:disabled="$wire.qty >= $wire.quantity || $wire.precio == 0" {{--Se desactiva si el precio es 0, solo acepta 15 entradas--}}
              wire:loading.attr="disabled"
              wire:target="increment"
              wire:click="increment"> 
                +
            </x-jet-secondary-button>
        </div>
        <div class="flex-1"> {{--boton de agregar al paquete--}}
            <x-jet-button class="ml-3 w-full 
                justify-center"
                x-bind:disabled="$wire.qty > $wire.quantity" {{--se deshabilita cuando no hay stock--}}
                wire:click="addLugarTuristico"
                wire:loading.attr="disabled"
                wire:target="addLugarTuristico">
                Agregar al paquete
            </x-jet-button>
        </div>
    </div>
</div>