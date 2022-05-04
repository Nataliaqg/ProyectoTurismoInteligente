<div>

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    Ciudades
                </h1>
                <x-jet-danger-button wire:click="$emit('deleteCiudad')">
                    Eliminar
                </x-jet-danger-button>
            </div>
        </div>
    </header>


<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    <h1 class="text-3xl text-center font-semibold mb-8">Complete esta informacion para crear una ciudad</h1>

<div class="bg-white shadow-xl rounded-lg p-6">
  <div class="grid grid-cols-2 gap-6 mb-4">

    {{-- Nombre --}}
    <div class="mb-4">
        <x-jet-label value="Nombre" />
        <x-jet-input type="text" 
                    class="w-full"
                    wire:model="ciudad.nombre"
                    placeholder="Ingrese el nombre de la ciudad" />
        <x-jet-input-error for="ciudad.nombre" />
    </div>

     {{-- Slug --}}
     <div class="mb-4">
        <x-jet-label value="Slug" />
        <x-jet-input type="text"
            disabled
            wire:model="ciudad.slug"
            class="w-full bg-gray-200" 
            placeholder="Ingrese el slug de la ciudad" />
    <x-jet-input-error for="ciudad.slug" />
    </div>

    {{-- Abreviatura --}}
    <div class="mb-4">
        <x-jet-label value="Abreviatura" />
        <x-jet-input type="text"  {{--VER--}}
                    wire:model="ciudad.abreviatura"
                    class="w-full"
                    placeholder="Ingrese la abreviatura de la ciudad" />
        <x-jet-input-error for="ciudad.abreviatura" />
    </div>


    <div class="flex justify-end items-center">
        <x-jet-action-message class="mr-3" on="saved">
            Actualizado exitosamente
        </x-jet-action-message>
        <x-jet-button 
            wire:loading.attr="disabled"
            wire:target="save"
            wire:click="save">
            Actualizar ciudad
        </x-jet-button>
    </div>


  </div>
</div>

</div>

{{---------------------------------------}}

@push('script')
        <script>
            Livewire.on('deleteCiudad', () => {

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.edit-ciudad', 'delete');

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })

            })

           
        </script>
    @endpush


</div>