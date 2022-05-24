<div class=' max max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700'>
    <h1 class="  text-3xl text-center font-semibold mb-8">
        Complete la informacion para crear un viaje
    </h1>
    
    {{-- Ciudad Origen --}}
    <div class="grid grid-cols-2 gap-6 mb-4">
        <div>
            <x-jet-label value="Ciudad de Origen" />
            <select class="w-full form-control" wire:model="ciudadOrigen_id">
                <option value="" selected disabled>Seleccione una ciudad de Origen del viaje</option>

                @foreach ($ciudads as $ciudad)
                    <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="ciudadOrigen_id" />
        </div>

        <x-jet-action-message class="mr-3 text-center font-semibold text-xl italic underline decoration-dotted "
            on="saved">
            Viaje creado
        </x-jet-action-message>
    </div>

    {{-- Ciudad Destino --}}
    <div class="grid grid-cols-2 gap-6 mb-4">
        <div>
            <x-jet-label value="Ciudad de Destino" />
            <select class="w-full form-control" wire:model="ciudadDestino_id">
                <option value="" selected disabled>Seleccione una ciudad de Destino del viaje</option>

                @foreach ($ciudads as $ciudad)
                    <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="ciudadDestino_id" />
        </div>

       
    </div>

     {{-- Transporte --}}
     <div class="grid grid-cols-2 gap-6 mb-4">
        <div>
            <x-jet-label value="transportes" />
            <select class="w-full form-control" wire:model="transporte_id">
                <option value="" selected disabled>Seleccione un transporte</option>

                @foreach ($transportes as $transporte)
                    <option value="{{ $transporte->id }}">{{ $transporte->tipoTransporte }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="transporte_id" />

        </div>
       
    </div>

    {{-- Fecha --}}
    <div class="mb-4">
        <x-jet-label value="Fecha" />
        <x-jet-input type="date" class="w-full" wire:model="fecha" placeholder="Ingrese la fecha del viaje" />
        <x-jet-input-error for="fecha" />
    </div>

    {{-- Hora --}}
    <div class="mb-4">
        <x-jet-label value="Hora" />
        <x-jet-input type="time"
         wire:model="hora" placeholder="Ingrese la hora del viaje" />
        <x-jet-input-error for="hora" />
    </div>

     {{-- precio --}}
     <div>
        <x-jet-label value="Precio" />
        <x-jet-input wire:model="precio" 
        type="number"           
        step=".01" />
        <x-jet-input-error for="precio" />
    </div>
    

    <div class="justify-end items-center mt-4">
        <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save" class="ml-auto">
            Crear Viaje
        </x-jet-button>
        <x-jet-button>
            <a href="{{ route('admin.viaje.show') }}">viajes</a>
        </x-jet-button>
      
    </div>

</div>