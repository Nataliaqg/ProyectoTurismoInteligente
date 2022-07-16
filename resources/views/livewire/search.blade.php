<div class="flex-1 relative" x-data>
    <x-jet-input wire:model="search" type="text" class="w-full" placeholder="¿Estás buscando algún servicio?" />

    <button class="absolute top-0 right-0 w-12 h-full bg-indigo-500 flex items-center justify-center rounded-r-md">
        <x-search size="35" color="white" />
    </button>

    
    <div class="absolute w-full hidden" :class="{'hidden':!$wire.open}" @click.away="$wire.open = false">
        <div class="bg-white rounded-lg shadow mt-1">
            <div class="px-4 py-3">
               @forelse ($tipoServicio as $tipo)
               <a href="{{route('categories.show',$tipo->id)}}"  class="flex">
               {{$tipo->nombre}}
               </a>
               @empty
                   <p class="text-lg leading-5">
                    No existe ningún servicio con los parámetros especificados
                   </p>
               @endforelse
            </div>
        </div>

    </div>
    
</div>
