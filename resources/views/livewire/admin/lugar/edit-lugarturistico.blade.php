<div>
    <div class=' max max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700'>
        <h1 class="  text-3xl text-center font-semibold mb-8">
            Complete la informacion para Editar un lugar turistico
        </h1>
        <div class="mb-4" wire:ignore>
            <form action="{{ route('admin.lugar.files', $lugarturistico) }}" 
                method="POST" 
                class="dropzone"
                id="my-awesome-dropzone"></form>
        </div>    
    
        @if ($lugarturistico->images->count())

        <section class="bg-white shadow-xl rounded-lg p-6 mb-4">
            <h1 class="text-2xl text-center font-semibold mb-2">Imagenes del lugar</h1>

            <ul class="flex flex-wrap">
                @foreach ($lugarturistico->images as $image)

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

            {{-- las categorias a elegir --}}
            <div class="grid grid-cols-2 gap-6 mb-4">
                <div>
                    <x-jet-label value="categorias" />
                    <select class="w-full form-control" wire:model="lugarturistico.categoria_id">
                        <option value="" selected disabled>Seleccione una categoria</option>

                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="lugarturistico.categoria_id" />

                </div>
            </div>
            {{-- las ciudades a elegir --}}
            <div class="grid grid-cols-2 gap-6 mb-4">
                <div>
                    <x-jet-label value="ciudades" />
                    <select class="w-full form-control" wire:model="lugarturistico.ciudad_id">
                        <option value="" selected disabled>Seleccione una ciudad</option>

                        @foreach ($ciudads as $ciudad)
                            <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="lugarturistico.ciudad_id" />

                </div>
                <x-jet-action-message class="mr-3 text-center font-semibold text-xl italic underline decoration-dotted "
                    on="saved">
                    Lugar Turistico Actualizado
                </x-jet-action-message>
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
             
                <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                    Actualizar Lugar
                </x-jet-button>
                <x-jet-button>
                    <a href="{{ route('admin.lugarturistico.show') }}">Lugares Turisticos</a>
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
                Livewire.emit('refreshLugar');
            }
        };
        </script>
        
    @endpush
</div>
