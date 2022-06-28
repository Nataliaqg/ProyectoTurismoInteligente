<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    <h1 class="text-3xl text-center font-semibold mb-8">
        Complete esta informacion para crear un Transporte Privado
    </h1>
    {{--Categoria--}}
    <div class="bg-white shadow-xl rounded-lg p-6">
        <div class="grid grid-cols-1 py-2">
            <div>
                <x-jet-label value="Categoria" />
                <select class="w-full form-control" wire:model="categoria_id">
                    <option value="" selected disabled>Seleccione una categoria</option>

                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endforeach

                </select>
                <x-jet-input-error for="categoria_id"/>
            </div>
        </div>
    {{--TIPO VEHICULO--}}
    <div class="bg-white shadow-xl rounded-lg p-6">
        <div class="grid grid-cols-1 py-2">
            <div>
                <x-jet-label value="Tipo de vehiculo" />
                <select class="w-full form-control" wire:model="tipoTransPrivado_id">
                    <option value="" selected disabled>Seleccione un tipo de transporte</option>

                    @foreach ($tipoTransPrivados as $tipoTransPrivado)
                        <option value="{{$tipoTransPrivado->id}}">{{$tipoTransPrivado->nombre}}</option>
                    @endforeach

                </select>
                <x-jet-input-error for="tipoTransPrivado_id"/>
            </div>
        </div>

      {{-- precio --}}
       <div>
          <x-jet-label value="Precio" />
          <x-jet-input wire:model="precio" 
          type="number"           
          step=".01" /> BS
          <x-jet-input-error for="precio" />
        </div>
         
        {{-- Cantidad de personas --}}
       <div>
        <x-jet-label value="Capacidad de Personas" />
        <x-jet-input wire:model="capacidadPersonas" 
        type="number"           
        step=".01" /> 
        <x-jet-input-error for="capacidadPersonas" />
      </div>

        <div class="justify-end items-center mt-4">
        <x-jet-button wire:loading.attr="disabled" 
        wire:target="save" 
        wire:click="save" 
        class="ml-auto">
            Crear Transporte Privado
        </x-jet-button>
        
        <x-jet-button>
            <a href="{{ route('admin.transporteprivado.show') }}">Transportes Privados</a>
        </x-jet-button>
        
        <x-jet-action-message class="mr-3 text-center font-semibold text-xl italic underline decoration-dotted "
             on="saved">
             Transporte Privado creado 
             </x-jet-action-message>
    </div>

    </div>

</div>
