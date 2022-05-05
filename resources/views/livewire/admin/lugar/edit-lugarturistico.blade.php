<div>
    <div class=' max max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700'>
        <h1 class="  text-3xl text-center font-semibold mb-8">
            Complete la informacion para crear un lugar turistico
        </h1>
        <div class="bg-white shadow-xl rounded-lg p-6">
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
            </div>

            {{-- Nombre --}}
            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" class="w-full" wire:model="lugarturistico.nombre"
                    placeholder="Ingrese el nombre del lugar turistico" />
                <x-jet-input-error for="lugarturistico.nombre" />
            </div>

            {{-- descripcion --}}
            <div class="mb-4">
                <div wire:ignore>
                    <x-jet-label value="Descripción" />
                    <textarea class="w-full form-control" rows="3" wire:model="lugarturistico.descripcion">
                </textarea>
                </div>
                <x-jet-input-error for="lugarturistico.descripcion" />
            </div>

            {{-- direccion --}}
            <div class="mb-4">
                <x-jet-label value="Direccion" />
                <x-jet-input type="text" class="w-full" wire:model="lugarturistico.direccion"
                    placeholder="Ingrese la direccion" />
                <x-jet-input-error for="lugarturistico.direccion" />
            </div>


            <div class="grid grid-cols-3 gap-6 mb-4">
                {{-- precio --}}
                <div>
                    <x-jet-label value="Precio" />
                    <x-jet-input wire:model="lugarturistico.precio" type="number" step=".01" />
                    <x-jet-input-error for="lugarturistico.precio" />
                </div>
                {{-- entrada --}}
                <div class="mb-4">
                    <x-jet-label value="Hora de Entrada" />
                    <x-jet-input type="time" wire:model="lugarturistico.horaEntrada"
                        placeholder="Ingrese la hora de entrada" />
                    <x-jet-input-error for="lugarturistico.horaEntrada" />
                </div>
                {{-- salida --}}
                <div class="mb-4">
                    <x-jet-label value="Hora de salida" />
                    <x-jet-input type="time" wire:model="lugarturistico.horaSalida"
                        placeholder="Ingrese la hora de salida" />
                    <x-jet-input-error for="lugarturistico.horaSalida" />
                </div>
            </div>

            <div class=" justify-end items-center mt-4">
                <x-jet-action-message class="mr-3" on="saved">
                    lugar actualizado
                </x-jet-action-message>
                <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                    Actualizar Lugar
                </x-jet-button>
                <a href="{{ route('admin.lugarturistico.show') }}"
                    class="text-justify border-black ">Lugares Turisticos</a>
                
            </div>
        </div>

    </div>
</div>
