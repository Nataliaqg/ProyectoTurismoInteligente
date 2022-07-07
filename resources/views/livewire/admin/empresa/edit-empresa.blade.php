<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    <h1 class="text-3xl text-center font-semibold mb-8">
        Complete esta informacion para editar la Informacion de la Empresa
    </h1>

    

    <div class="bg-white shadow-xl rounded-lg p-6">
      
            {{-- Nombre --}}
        <div class="mb-4">
            <x-jet-label value="Nombre"/>
            <x-jet-input 
                type="text" 
                class="w-full" 
                wire:model="empresa.nombre"
                placeholder="Ingrese el nombre de la Agencia"/>
                <x-jet-input-error for="empresa.nombre"/>
        </div>

            {{-- Tipo --}}
        <div class="mb-4">
            <x-jet-label value="Ubicacion" />
            <x-jet-input 
                type="text" 
                class="w-full" 
                wire:model="empresa.ubicacion"
                placeholder="Ingrese el tipo de Agencia"/>
                <x-jet-input-error for="empresa.ubicacion"/>
        </div>

        <div class="mb-4">
            <x-jet-label value="Direccion" />
            <x-jet-input 
                type="text" 
                class="w-full" 
                wire:model="empresa.direccion"
                placeholder="Ingrese el tipo de Agencia"/>
                <x-jet-input-error for="empresa.direccion"/>
        </div>

        <div class="mb-4">
            <x-jet-label value="Email" />
            <x-jet-input 
                type="email" 
                class="w-full" 
                wire:model="empresa.email"
                placeholder="Ingrese el tipo de Agencia"/>
                <x-jet-input-error for="empresa.email"/>
        </div>


        <div class="mb-4">
            <x-jet-label value="Telefono" />
            <x-jet-input 
                type="number" 
                class="w-full" 
                wire:model="empresa.telefono"
                placeholder="Ingrese el tipo de Agencia"/>
                <x-jet-input-error for="empresa.telefono"/>
        </div>

        <div class="mb-4">
            <x-jet-label value="Facebook" />
            <x-jet-input 
                type="text" 
                class="w-full" 
                wire:model="empresa.facebook"
                placeholder="Ingrese el tipo de Agencia"/>
                <x-jet-input-error for="empresa.facebook"/>
        </div>

        <div class="mb-4">
            <x-jet-label value="Whatsapp" />
            <x-jet-input 
                type="text" 
                class="w-full" 
                wire:model="empresa.whatsapp"
                placeholder="Ingrese el tipo de Agencia"/>
                <x-jet-input-error for="empresa.whatsapp"/>
        </div>

        <div class="mb-4">
            <x-jet-label value="Instagram" />
            <x-jet-input 
                type="text" 
                class="w-full" 
                wire:model="empresa.instagram"
                placeholder="Ingrese el tipo de Agencia"/>
                <x-jet-input-error for="empresa.instagram"/>
        </div>


        <div class="flex justify-end mt-4">
            {{-- <x-jet-action-message class="mr-3" on="saved">
                Actualizado exitosamente
            </x-jet-action-message> --}}

            <x-jet-button
                wire:loading.attr="disabled"
                wire:target="save"
                wire:click="$emit('save', {{$empresa->id}})"
                class="ml-auto">
                Actualizar Datos
            </x-jet-button>
        </div>


    </div>




    @push('script')
    <script>
        Livewire.on('saved', empresa => {

            Swal.fire(
            'Actualizado exitosamente!',
            'Actualizaste los Datos!',
            'success'
            )

            Livewire.emitTo('admin.agencia.edit-empresa','saved',empresa); 
        })

    
    </script>
@endpush




</div>
