<div x-data>

    <p class="text-red-500 mt-3">
        <span class="font-semibold text-lg">Boletos disponibles: {{$quantity}}</span>
    </p>

    <div class="flex mt-4">
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
              x-bind:disabled="$wire.qty >= $wire.quantity" {{--Se desactiva cuando ha llegado a su tope--}}
              wire:loading.attr="disabled"
              wire:target="increment"
              wire:click="increment"> 
                +
            </x-jet-secondary-button>
        </div>
        <div class="flex-1 "> {{--boton de agregar al paquete--}}
            <x-jet-button class="ml-3 w-full 
                justify-center"
                wire:click="addViaje" 
                wire:loading.attr="disabled"
                wire:target="addViaje">
                Agregar al paquete
            </x-jet-button>
        </div>
    </div>
</div>
