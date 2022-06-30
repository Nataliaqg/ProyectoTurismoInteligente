<div>
    <div class=' max max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700'>
        <h1 class="  text-3xl text-center font-semibold mb-8">
            Actualize la informacion del Viaje
        </h1>  

        <div class="mb-4" wire:ignore>
            <form action="{{ route('admin.viaje.files', $viaje) }}" 
                method="POST" 
                class="dropzone"
                id="my-awesome-dropzone"></form>
        </div>
        
        @if ($viaje->images->count())

        <section class="bg-white shadow-xl rounded-lg p-6 mb-4">
            <h1 class="text-2xl text-center font-semibold mb-2">Imagenes del Viaje</h1>

            <ul class="flex flex-wrap">
                @foreach ($viaje->images as $image)

                    <li class="relative" wire:key="image-{{ $image->id }}">
                        <img class="w-32 h-20 object-cover" src="{{ Storage::url($image->url) }}" alt="">
                        <x-jet-danger-button class="absolute right-2 top-2"
                            wire:click="deleteImage({{ $image->id }})" wire:loading.attr="disabled"
                            wire:target="deleteImage({{ $image->id }})">
                            x
                        </x-jet-danger-button>
                    </li>
                @endforeach
            </ul>
        </section>
        @endif

    <div class="bg-white shadow-xl rounded-lg p-6">
    {{-- Categoria --}}
    <div class="grid grid-cols-2 gap-6 mb-4">
        <div>
            <x-jet-label value="Categoria" />
            <select class="w-full form-control" wire:model="viaje.categoria_id">
                <option value="" selected disabled>Seleccione la categoria</option>

                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="viaje.categoria_id" />
        </div>
    </div>
    {{-- Ciudad Origen --}}
    <div class="grid grid-cols-2 gap-6 mb-4">
        <div>
            <x-jet-label value="Ciudad de Origen" />
            <select class="w-full form-control" wire:model="viaje.ciudadOrigen_id">
                <option value="" selected disabled>Seleccione una ciudad de Origen del viaje</option>

                @foreach ($ciudads as $ciudad)
                    <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="viaje.ciudadOrigen_id" />
        </div>
    </div>

    {{-- Ciudad Destino --}}
    <div class="grid grid-cols-2 gap-6 mb-4">
        <div>
            <x-jet-label value="Ciudad de Destino" />
            <select class="w-full form-control" wire:model="viaje.ciudadDestino_id">
                <option value="" selected disabled>Seleccione una ciudad de Destino del viaje</option>

                @foreach ($ciudads as $ciudad)
                    <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="viaje.ciudadDestino_id" />
        </div>  
    </div>
            {{-- Transporte --}}
            <div class="grid grid-cols-2 gap-6 mb-4">
                <div>
                    <x-jet-label value="transportes" />
                    <select class="w-full form-control" wire:model="viaje.transporte_id">
                        <option value="" selected disabled>Seleccione un transporte</option>
        
                        @foreach ($transportes as $transporte)
                            <option value="{{ $transporte->id }}">{{ $transporte->agencia->tipoAgencia->tipoAgencia}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="transporte_id" />
                </div>

                <x-jet-action-message class="mr-3 text-center font-semibold text-xl italic underline decoration-dotted "
                    on="saved">
                    Viaje actualizado
                </x-jet-action-message>
        
            </div>
        
            {{-- Fecha --}}
            <div class="mb-4">
                <x-jet-label value="Fecha" />
                <x-jet-input type="date" class="w-full" wire:model="viaje.fecha" placeholder="Ingrese la fecha del viaje" />
                <x-jet-input-error for="viaje.fecha" />
            </div>
        
            {{-- Hora --}}
            <div class="mb-4">
                <x-jet-label value="Hora" />
                <x-jet-input type="time"
                 wire:model="viaje.hora" placeholder="Ingrese la hora del viaje" />
                <x-jet-input-error for="viaje.hora" />
            </div>
        
             {{-- precio --}}
             <div>
                <x-jet-label value="Precio" />
                <x-jet-input wire:model="viaje.precio" 
                type="number"           
                step=".01" />
                <x-jet-input-error for="viaje.precio" />
            </div>
            
        
            <div class="justify-end items-center mt-4">
                <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save" class="ml-auto">
                    Actualizar viaje
                </x-jet-button>
                <x-jet-button>
                    <a href="{{ route('admin.viaje.show') }}">viajes</a>
                </x-jet-button>
              
            </div>

          </div>
    </div>

    @push('script')
    <script>
        Dropzone.options.myAwesomeDropzone = {
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            dictDefaultMessage: "Arrastre una imagen al recuadro",
            acceptedFiles: 'image/*',//paraq solo se muestren imagenes
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
           complete: function(file) {
                this.removeFile(file);
            },
            queuecomplete: function() {
                Livewire.emit('refreshViaje');
            }
        };
        </script>
    @endpush
</div>
