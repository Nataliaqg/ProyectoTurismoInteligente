<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    <h1 class="text-3xl text-center font-semibold mb-8">
        Complete esta informacion para editar una Agencia
    </h1>

    

    <div class="bg-white shadow-xl rounded-lg p-6">
      
            {{-- Nombre --}}
        <div class="mb-4">
            <x-jet-label value="Nombre"/>
            <x-jet-input 
                type="text" 
                class="w-full" 
                wire:model="agencia.nombre"
                placeholder="Ingrese el nombre de la Agencia"/>
                <x-jet-input-error for="agencia.nombre"/>
        </div>

            {{-- Tipo --}}
        <div class="mb-4">
            <x-jet-label value="Tipo" />
            <x-jet-input 
                type="text" 
                class="w-full" 
                wire:model="agencia.tipo"
                placeholder="Ingrese el tipo de Agencia"/>
                <x-jet-input-error for="agencia.tipo"/>
        </div>

        <div class="flex justify-end mt-4">
            <x-jet-action-message class="mr-3" on="saved">
                Actualizado exitosamente
            </x-jet-action-message>

            <x-jet-button
                wire:loading.attr="disabled"
                wire:target="save"
                {{-- wire:click="save" --}}
                wire:click="$emit('save', {{$agencia->id}})"
                class="ml-auto">
                Actualizar Agencia
            </x-jet-button>
        </div>

    </div>


    @push('script')
    <script>
        Livewire.on('save', agencia => {

            Swal.fire(
            'Actualizado exitosamente!',
            'Actualizaste la agencia!',
            'success'
            )

            Livewire.emitTo('admin.agencia.edit-agencia','save',agencia); 
        })

    
    </script>
@endpush




</div>
