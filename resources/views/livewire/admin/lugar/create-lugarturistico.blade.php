<div class=' max max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700'>
    <h1 class="  text-3xl text-center font-semibold mb-8">
        Complete la informacion para crear un lugar turistico
    </h1>

    {{-- las categorias a elegir --}}
    <div class="grid grid-cols-2 gap-6 mb-4">
        <div>
            <x-jet-label value="categorias" />
            <select class="w-full form-control" wire:model="categoria_id">
                <option value="" selected disabled>Seleccione una categoria</option>

                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="categoria_id" />

        </div>
    </div>
    
    {{-- las ciudades a elegir --}}
    <div class="grid grid-cols-2 gap-6 mb-4">
        <div>
            <x-jet-label value="ciudades" />
            <select class="w-full form-control" wire:model="ciudad_id">
                <option value="" selected disabled>Seleccione una ciudad</option>

                @foreach ($ciudads as $ciudad)
                    <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="ciudad_id" />

        </div>
        <x-jet-action-message class="mr-3 text-center font-semibold text-xl italic underline decoration-dotted "
            on="saved">
            Lugar turistico Creado 
        </x-jet-action-message>
    </div>

    {{-- Nombre --}}
    <div class="mb-4">
        <x-jet-label value="Nombre" />
        <x-jet-input type="text" class="w-full" wire:model="nombre"
            placeholder="Ingrese el nombre del lugar turistico" />
        <x-jet-input-error for="nombre" />
    </div>

    {{-- descripcion --}}
    <div class="mb-4">
        <div wire:ignore>
            <x-jet-label value="Descripción" />
            <textarea class="w-full form-control" rows="3" wire:model="descripcion">
            </textarea>
        </div>
        <x-jet-input-error for="descripcion" />
    </div>

    {{-- direccion --}}
    <div class="mb-4">
        <x-jet-label value="Direccion" />
        <x-jet-input type="text" class="w-full" wire:model="direccion" placeholder="Ingrese la direccion" />
        <x-jet-input-error for="direccion" />
    </div>


    <div class="grid grid-cols-3 gap-6 mb-4">
        {{-- precio --}}
        <div>
            <x-jet-label value="Precio" />
            <x-jet-input wire:model="precio" 
            type="number"           
            step=".01" />
            <x-jet-input-error for="precio" />
        </div>
        {{-- entrada --}}
        <div class="mb-4">
            <x-jet-label value="Hora de Entrada" />
            <x-jet-input type="time"
             wire:model="horaEntrada" placeholder="Ingrese la hora de entrada" />
            <x-jet-input-error for="horaEntrada" />
        </div>
        {{-- salida --}}
        <div class="mb-4">
            <x-jet-label value="Hora de salida" />
            <x-jet-input type="time" 
            wire:model="horaSalida" placeholder="Ingrese la hora de salida" />
            <x-jet-input-error for="horaSalida" />
        </div>
    </div>

    <div class="justify-end items-center mt-4">
        <x-jet-button
        wire:loading.attr="disabled"
        wire:target="save"
            wire:click="save"
            class="ml-auto">
            Crear Lugar Turistico
        </x-jet-button>
        <x-jet-button>
            <a href="{{ route('admin.lugarturistico.show') }}">Lugares Turisticos</a>
        </x-jet-button>
    </div>

</div>
