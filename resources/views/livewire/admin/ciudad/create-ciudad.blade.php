<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    <h1 class="text-3xl text-center font-semibold mb-8">Complete esta informacion para crear una ciudad</h1>
    
    {{-- Nombre --}}
    <div class="mb-4">
        <x-jet-label value="Nombre" />
        <x-jet-input type="text" 
                    class="w-full"
                    wire:model="nombre"
                    placeholder="Ingrese el nombre de la ciudad" />
        <x-jet-input-error for="nombre" />
    </div>

     
    {{-- Abreviatura --}}
    <div class="mb-4">
        <x-jet-label value="Abreviatura" />
        <x-jet-input type="text"  {{--VER--}}
                    wire:model="abreviatura"
                    class="w-full"
                    placeholder="Ingrese la abreviatura de la ciudad" />
        <x-jet-input-error for="abreviatura" />
    </div>


    <div class="flex">
        <x-jet-button 
            wire:loading.attr="disabled"
            wire:target="save"
            wire:click="save"
            class="ml-auto">
            Crear ciudad
        </x-jet-button>
    </div>

</div>
