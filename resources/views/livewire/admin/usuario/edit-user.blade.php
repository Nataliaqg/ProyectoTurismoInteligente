<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    <h1 class="text-3xl text-center font-semibold mb-8">
        Complete esta informacion para Editar una Usuario
    </h1>


    <div class="bg-white shadow-xl rounded-lg p-6">
        

            {{-- Nombre --}}
        <div class="mb-4">
            <x-jet-label value="Nombre"/>
            <x-jet-input 
                type="text" 
                class="w-full" 
                wire:model="user.name"
                placeholder="Ingrese el nombre del Usuario"/>
                <x-jet-input-error for="user.name"/>
        </div>

            {{-- Telefono --}}
        <div class="mb-4">
            <x-jet-label value="Teléfono" />
            <x-jet-input 
                type="number" 
                class="w-full" 
                wire:model="user.telefono"
                placeholder="Digite el numero de Teléfono"/>
                <x-jet-input-error for="user.telefono"/>
        </div>

        {{-- Edad --}}
        <div class="mb-4">
            <x-jet-label value="Edad" />
            <x-jet-input 
                type="number" 
                class="w-full" 
                wire:model="user.edad"
                placeholder="Digite la Edad"/>
                <x-jet-input-error for="user.edad"/>
        </div>


          {{-- Carnet de Identidad --}}
          <div class="mb-4">
            <x-jet-label value="Carnet de Identidad" />
            <x-jet-input 
                type="number" 
                class="w-full" 
                wire:model="user.carnetIdentidad"
                placeholder="Digite el numero de Carnet de Identidad"/>
                <x-jet-input-error for="user.carnetIdentidad"/>
        </div>

        {{-- Correo --}}
        <div class="mb-4">
            <x-jet-label value="E-mail" />
            <x-jet-input 
                type="email" 
                class="w-full" 
                wire:model="user.email"
                placeholder="Escriba el Correo"/>
                <x-jet-input-error for="user.email"/>
        </div>


          {{-- Contraseña --}}
          <div class="mb-4">
            <x-jet-label value="Contraseña" />
            <x-jet-input 
                type="password" 
                class="w-full" 
                wire:model="password"
                placeholder="Escriba la contraseña"/>
                <x-jet-input-error for="password"/>
        </div>
        
     
        {{-- Guardar --}}
        <div class="flex justify-end mt-4">
            <x-jet-action-message class="mr-3" on="saved">
                Actualizado exitosamente
            </x-jet-action-message>

             {{-- Boton Guardar --}}
            <x-jet-button
                wire:loading.attr="disabled"
                wire:target="save"
                {{-- wire:click="save" --}}
                wire:click="$emit('save', {{$user->id}})"
                class="ml-auto">     
                Actualizar Usuario
            </x-jet-button>
        </div>
        <x-jet-button>
            <a  href="{{ route('admin.users.show') }}">Usuarios</a>
        </x-jet-button>

    </div>

    @push('script')
    <script>
        Livewire.on('saved', user => {

            Swal.fire(
            'Actualizado exitosamente!',
            'Actualizaste el usuario!',
            'success'
            )

            Livewire.emitTo('admin.usuario.edit-user','saved',user); 
        })

    
    </script>
   @endpush



</div>
