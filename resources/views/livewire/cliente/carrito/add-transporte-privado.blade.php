<div x-data> {{--aplicamos funcionalidades de Alpine--}}
        

    <?php
    date_default_timezone_set('UTC');
    date_default_timezone_set('America/La_Paz');
    $fechaActual = date('Y-m-d');
    ?>
    <div class="mb-4">
        <x-jet-label value="Fecha" />
        <x-jet-input type="date" min="{{ $fechaActual }}" class="w-full" wire:model="fecha"
            placeholder="Ingrese la fecha" />
        <x-jet-input-error for="fecha" />
    </div>
  @if ($reserva)
  <p class="text-red-500 mb-4">
    <span class="font-semibold text-lg">El Vehiculo ya fue reservado en esa fecha</span>
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
                wire:click="addTransporte"
                wire:loading.attr="disabled"
                wire:target="addTransporte">
                Agregar al paquete
            </x-jet-button>
        </div>
    </div>
</div>