<div x-data> {{-- aplicamos funcionalidades de Alpine --}}
   
   <?php
    date_default_timezone_set('UTC');
    date_default_timezone_set('America/La_Paz');
    $fechaActual = date('Y-m-d');
    ?>
    <div class="mb-4">
        <x-jet-label value="Fecha" />
        <x-jet-input type="date" min="{{ $fechaActual }}" class="w-full" wire:model="fecha"
            placeholder="Ingrese la fecha del viaje" />
        <x-jet-input-error for="fecha" />
    </div>
    <p class="text-xl text-gray-700">capacidad de la mesa:</p>

    <select wire:model="mesa_id" class="form-control w-full">
        <option value="" selected disabled>Seleccionar la capacidad de la mesa</option>
        @foreach ($mesas as $mesa)
            <option value="{{ $mesa->id }}">{{ __($mesa->capacidad_mesa) }}</option>
        @endforeach
    </select>

    <p class="text-gray-700 my-4">
        <span class="font-semibold text-lg"> Mesas disponible:</span>
        {{ $quantity }}
    </p>
  

    <div class="flex">
        <div> {{-- para asignacion de cantidad --}}
            <x-jet-secondary-button {{-- boton de menos --}} disabled x-bind:disabled="$wire.qty <= 1"
                {{-- accede al valor de la propiedad del componente --}} wire:loading.attr="disabled" wire:target="decrement" wire:click="decrement">
                -
            </x-jet-secondary-button>
            <span class="mx-2 text-slate-600">{{ $qty }}</span>
            <x-jet-secondary-button {{-- boton de mas --}} disabled
                x-bind:disabled="$wire.qty >= $wire.quantity || $wire.precio == 0" {{-- Se desactiva si el precio es 0, solo acepta 15 entradas --}}
                wire:loading.attr="disabled" wire:target="increment" wire:click="increment">
                +
            </x-jet-secondary-button>
        </div>
        <div class="flex-1"> {{-- boton de agregar al paquete --}}
            <x-jet-button class="ml-3 w-full                 justify-center" x-bind:disabled="!$wire.quantity"
                {{-- se deshabilita cuando no hay stock --}} wire:click="addRestaurante" wire:loading.attr="disabled"
                wire:target="addRestaurante">
                Agregar al paquete
            </x-jet-button>
        </div>

    </div>
</div>
