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
    <h1 class="text-3xl text-center font-semibold mb-8">
        Complete esta informacion para editar un transporte privado
    </h1>
    <div class="mb-4" wire:ignore>
        <form action="{{ route('admin.transporteprivado.files', $transportePrivado) }}" 
            method="POST" 
            class="dropzone"
            id="my-awesome-dropzone"></form>
    </div> 

    @if ($transportePrivado->images->count())
    <section class="bg-white shadow-xl rounded-lg p-6 mb-4">
        <h1 class="text-2xl text-center font-semibold mb-2">Imagenes del Transporte Privado</h1>

        <ul class="flex flex-wrap">
            @foreach ($transportePrivado->images as $image)

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
  <div class="grid grid-cols-2 gap-6 mb-4">
    {{-- Categoria --}}
    <div class="grid grid-cols-2 gap-6 mb-4">
        <div>
            <x-jet-label value="Categoria" />
            <select class="w-full form-control" wire:model="transportePrivado.categoria_id">
                <option value="" selected disabled>Seleccione una categoria</option>

                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="transportePrivado.categoria_id" />
        </div>
    </div>
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
                Livewire.emit('refreshTransportePrivado');
            }
        };
        </script>
    @endpush
</div>