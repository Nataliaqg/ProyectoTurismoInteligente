<div class="flex items-center" x-data>
    <x-jet-secondary-button {{--boton de menos--}}
        disabled
        x-bind:disabled="$wire.qty <= 1"  {{--accede al valor de la propiedad del componente--}}
        wire:loading.attr="disabled"  
        wire:target="decrement"
        wire:click="decrement">
         -
    </x-jet-secondary-button> 

    <span class="mx-2">{{$qty}}</span>

    <x-jet-secondary-button {{--boton de mas--}}
        disabled
        x-bind:disabled="$wire.qty >= $wire.quantity" {{--Se desactiva cuando ha llegado a su tope--}}
        wire:loading.attr="disabled"
        wire:target="increment"
        wire:click="increment"> 
         +
    </x-jet-secondary-button>
</div>
