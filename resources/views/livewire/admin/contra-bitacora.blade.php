<div>
    <x-slot name="header">
      
    </x-slot>

    <div class="w-full min-h-min bg-gray-50 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-md p-2 mx-auto">
            <h2 class="mb-12 text-center text-2xl font-extrabold">Ingresar Bitacora</h2>
            
                <div class="mb-4">
                    <label class="block mb-1" for="password">Password</label>
                    <input wire:model="contra" type="password" name="contraseña"
                        class="py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />
               
                    </div>
                    @if ($error)
                    <div class="text-red-500 text-xs italic">
                        contraseña incorrectas...
                    </div>
                @endif
               

                <div class="justify-end items-center mt-4">
                    <x-jet-button wire:loading.attr="disabled" wire:target="verificar" wire:click="verificar"
                        class="ml-auto">
                        Ir a la Bitacora
                    </x-jet-button>
                </div>

        </div>
    </div>

</div>
