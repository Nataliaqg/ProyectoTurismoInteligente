<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    <h1 class="text-3xl text-center font-semibold mb-8">
        Complete esta informacion para crear un Transporte
    </h1>


    <div class="bg-white shadow-xl rounded-lg p-6">
        <div class="grid grid-cols-1 py-2">
            <div>
                <x-jet-label value="Agencias" />
                <select class="w-full form-control" wire:model="agencias_id">
                    <option value="" selected disabled>Seleccione una Agencia</option>

                    @foreach ($agencias as $agencia)
                        <option value="{{$agencia->id}}">{{$agencia->nombre}}</option>
                    @endforeach

                </select>
                <x-jet-input-error for="agencias_id"/>
            </div>
        </div>


        <div class="grid grid-cols-1 py-2">
            <div>
                <x-jet-label value="Agencias" />
                <select class="w-full form-control" wire:model="tipoAgencia_id">
                    <option value="" selected disabled>Seleccione el tipo de Agencia</option>

                    @foreach ($tipoAgencias as $tipoAgencia)
                        <option value="{{$tipoAgencia->id}}">{{$tipoAgencia->tipoAgencia}}</option>
                    @endforeach

                </select>
                <x-jet-input-error for="tipoAgencia_id"/>
            </div>
        </div>


        
            {{-- Modelo --}}
            <div class="mb-4">
                <x-jet-label value="Modelo" />
                <x-jet-input 
                    type="text" 
                    class="w-full" 
                    wire:model="modelo"
                    placeholder="Ingrese el modelo o nombre del Transporte"/>
                    <x-jet-input-error for="modelo"/>
            </div>
      
            {{-- Tipo --}}
        {{-- <div class="mb-4">
            <x-jet-label value="Tipo de Transporte" />
            <x-jet-input 
                type="text" 
                class="w-full" 
                wire:model="tipoTransporte"
                placeholder="Ingrese el tipo de Transporte"/>
                <x-jet-input-error for="tipoTransporte"/>
        </div> --}}

              {{-- Descripcion --}}
        <div class="mb-4">
             <x-jet-label value="Descripcion"/>
             <x-jet-input 
                type="text" 
                class="w-full" 
                wire:model="descripcion"
                placeholder="Ingrese la descripcion del Transporte"/>
                <x-jet-input-error for="descripcion"/>
         </div>

             {{-- Capacidad Maxima Asientos --}}
        <div class="mb-4">
            <x-jet-label value="Capacidad Maxima de Asientos"/>
            <x-jet-input 
               type="number" 
               class="w-full" 
               wire:model="capacidadMaximaAsientos"/>
               <x-jet-input-error for="capacidadMaximaAsientos"/>
         </div>
    

        <div class="flex">
            <x-jet-button
                wire:loading.attr="disabled"
                wire:target="save"
                wire:click="save"
                class="ml-auto">
                Crear Transporte
            </x-jet-button>
        </div>

    </div>

            @push('script')
            <script>
                Livewire.on('saved', transporte => {

                    Swal.fire(
                    'Creado exitosamente!',
                    'Creaste una Agencia!',
                    'success'
                    )

                    Livewire.emitTo('admin.usuario.edit-user','saved',transporte); 
                })

            
            </script>
        @endpush

    


</div>
