<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    <h1 class="text-3xl text-center font-semibold mb-8">
        Complete esta informacion para crear una Agencia
    </h1>


    <div class="bg-white shadow-xl rounded-lg p-6">
     

            {{-- Nombre --}}
        <div class="mb-4">
            <x-jet-label value="Nombre"/>
            <x-jet-input 
                type="text" 
                class="w-full" 
                wire:model="nombre"
                placeholder="Ingrese el nombre de la Agencia"/>
                <x-jet-input-error for="nombre"/>
        </div>

            {{-- Tipo
        <div class="mb-4">
            <x-jet-label value="Tipo" />
            <x-jet-input 
                type="text" 
                class="w-full" 
                wire:model="tipo"
                placeholder="Ingrese el tipo de Agencia"/>
                <x-jet-input-error for="tipo"/>
        </div> --}}

        <div class="grid grid-cols-1 py-2">
            <div>
                <x-jet-label value="Tipo de Agencias" />
                <select class="w-full form-control" wire:model="tipoAgencia_id">
                    <option value="" selected disabled>Seleccione el Tipo de Agencia</option>

                    @foreach ($tipoAgencias as $tipoAgencia)
                        <option value="{{$tipoAgencia->id}}">{{$tipoAgencia->tipoAgencia}}</option>
                    @endforeach

                </select>
                <x-jet-input-error for="tipoAgencia_id"/>
            </div>
        </div>


        <div class="flex">
            <x-jet-button
                wire:loading.attr="disabled"
                wire:target="save"
                wire:click="save"
                class="ml-auto">
                Crear Agencia
            </x-jet-button>
        </div>
        <x-jet-button>
            <a  href="{{ route('admin.agencias.show') }}">Agencias</a>
        </x-jet-button>
    </div>

         @push('script')
            <script>
                Livewire.on('saved', agencia => {

                    Swal.fire(
                    'Creado exitosamente!',
                    'Creaste una Agencia!',
                    'success'
                    )

                    Livewire.emitTo('admin.usuario.edit-user','saved',agencia); 
                })

            
            </script>
        @endpush


</div>
