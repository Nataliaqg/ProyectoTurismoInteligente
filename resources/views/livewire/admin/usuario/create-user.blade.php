<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    <h1 class="text-3xl text-center font-semibold mb-8">
        Complete esta informacion para crear una Usuario
    </h1>


    <div class="bg-white shadow-xl rounded-lg p-6">
        

            {{-- Nombre --}}
        <div class="mb-4">
            <x-jet-label value="Nombre"/>
            <x-jet-input 
                type="text" 
                class="w-full" 
                wire:model="name"
                placeholder="Ingrese el nombre del Usuario"/>
                <x-jet-input-error for="name"/>
        </div>

            {{-- Telefono --}}
        <div class="mb-4">
            <x-jet-label value="Teléfono" />
            <x-jet-input 
                type="number" 
                class="w-full" 
                wire:model="telefono"
                placeholder="Digite el numero de Teléfono"/>
                <x-jet-input-error for="telefono"/>
        </div>

        {{-- Edad --}}
        <div class="mb-4">
            <x-jet-label value="Edad" />
            <x-jet-input 
                type="number" 
                class="w-full" 
                wire:model="edad"
                placeholder="Digite la Edad"/>
                <x-jet-input-error for="edad"/>
        </div>


          {{-- Carnet de Identidad --}}
          <div class="mb-4">
            <x-jet-label value="Carnet de Identidad" />
            <x-jet-input 
                type="number" 
                class="w-full" 
                wire:model="carnetIdentidad"
                placeholder="Digite el numero de Carnet de Identidad"/>
                <x-jet-input-error for="carnetIdentidad"/>
        </div>

        {{-- Correo --}}
        <div class="mb-4">
            <x-jet-label value="E-mail" />
            <x-jet-input 
                type="email" 
                class="w-full" 
                wire:model="email"
                placeholder="Escriba el Correo"/>
                <x-jet-input-error for="email"/>
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

          {{-- Input de Password --}}
          {{-- <div class="mb-2">
            <label class="block  text-sm text-black">Contraseña</label>
             <input 
             class="w-full px-5 py-1  bg-gray-300 rounded focus:outline-none focus:bg-white form-input"
              type="password" 
              id="password" 
              placeholder="***************"
              name="password" required
              >
          </div> --}}
           {{-- Input de Confirmar Password --}}
           {{-- <div class="">
            <label class="block  text-sm text-black">Confirmar Contraseña</label>
             <input 
             class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-white form-input"
               type="password"
               id="password_confirmation" 
               placeholder="***************" 
               name="password_confirmation" required
               >
          </div> --}}
         

        <div class="flex">
            <x-jet-button
            class="flex justify-end items-end"
                wire:loading.attr="disabled"
                wire:target="save"
                wire:click="save"
                class="ml-auto">
                Crear Usuario
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
            'Creado exitosamente!',
            'Creaste un usuario!',
            'success'
            )

            Livewire.emitTo('admin.usuario.edit-user','saved',user); 
        })

    
    </script>
   @endpush


</div>
