<div>

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                        Actualizar Transporte Privado
                </h1>
            </div>
        </div>
    </header>


<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    <h1 class="text-3xl text-center font-semibold mb-8">Complete esta informacion para editar un transporte privado</h1>

<div class="bg-white shadow-xl rounded-lg p-6">
  <div class="grid grid-cols-2 gap-6 mb-4">

     {{-- Transporte --}}
     <div class="grid grid-cols-2 gap-6 mb-4">
        <div>
            <x-jet-label value="Tipo Transporte" />
            <select class="w-full form-control" wire:model="transportePrivado.tipoTransPrivado_id">
                <option value="" selected disabled>Seleccione un transporte</option>

                @foreach ($tipoTransPrivados as $tipoTransPrivado)
                    <option value="{{ $tipoTransPrivado->id }}">{{ $tipoTransPrivado->nombre }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="transportePrivado.tipoTransPrivado_id" />
        </div>
    </div>
    
     {{-- precio --}}
     <div>
        <x-jet-label value="Precio" />
        <x-jet-input wire:model="transportePrivado.precio" 
        type="number"           
        step=".01" />
        <x-jet-input-error for="transportePrivado.precio" />
    </div>

     {{-- capacidad Personas --}}
     <div>
        <x-jet-label value="Capacidad de personas" />
        <x-jet-input wire:model="transportePrivado.capacidadPersonas" 
        type="number"           
        step=".01" />
        <x-jet-input-error for="transportePrivado.capacidadPersonas" />
    </div>


    <div class="flex justify-end items-center">
        <x-jet-action-message class="mr-3" on="saved">
            Actualizado exitosamente
        </x-jet-action-message>
        <x-jet-button 
            wire:loading.attr="disabled"
            wire:target="save"
            wire:click="save">
            Actualizar transporte privado
        </x-jet-button>
    </div>


  </div>
</div>

</div>


</div>