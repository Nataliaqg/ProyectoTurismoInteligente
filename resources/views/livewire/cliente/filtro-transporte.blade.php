<div>
    {{-- el titulo --}}
    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-gray-700 uppercase">{{ $categoria->nombre }}</h1>

            <div class="hidden md:block grid grid-cols-2 border border-gray-200 divide-x divide-gray-200 text-gray-500">
                <i class="fas fa-border-all p-3 cursor-pointer {{ $view == 'grid' ? 'text-blue-600' : '' }}"
                    wire:click="$set('view', 'grid')"></i>
                <i class="fas fa-th-list p-3 cursor-pointer  {{ $view == 'list' ? 'text-blue-600' : '' }}"
                    wire:click="$set('view', 'list')"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        {{-- el filtro de vehiculo --}}
     <aside>
            <h2 class="font-semibold text-center mb-2">TIPO VEHICULO</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($vehiculos as $vehiculo)
                    <li class="py-2 text-sm">
                        <a class="cursor-pointer hover:text-blue-600 {{ $movil == $vehiculo->id ? 'text-blue-600 font-bold' : '' }} "
                            wire:click="$set('movil','{{ $vehiculo->id }}')">{{ $vehiculo->nombre }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <x-jet-button class="mt-4" wire:click="limpiar">
                Eliminar filtros
            </x-jet-button>
        </aside>
        <div class="col-span-4">

            @if ($view == 'grid')
                {{-- cuadriculado --}}
                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($servicios as $servicio)
                        <li class="bg-white rounded-lg shadow">
                            <article>
                                <figure>
                                    @if ($servicio->images->first() == null)
                                        <img class="h-48 w-full object-cover object-center"
                                            src="https://images.pexels.com/photos/4883800/pexels-photo-4883800.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                            alt="">
                                    @else
                                        <img class="h-48 w-full object-cover object-center"
                                            src="{{ Storage::url($servicio->images->first()->url) }}" alt="">
                                    @endif
                                </figure>
                                <div class="py-4 px-6">
                                    <h1 class="text-lg font-semibold">
                                        <a href="">
                                           Precio : {{ $servicio->precio }}
                                        </a>
                                    </h1>
                                    <p class="font-bold text-trueGray-700"> Tipo : {{ $servicio->TipoTransPrivado->nombre }}</p>
                                </div>
                            </article>
                        </li>
                    @endforeach

                </ul>
            @else
                {{-- lista --}}
                <ul>
                    @foreach ($servicios as $servicio)
                        <li class="bg-white rounded-lg shadow mb-4">
                            <article class='flex'>
                                <figure>
                                    @if ($servicio->images->first() == null)
                                        <img class="h-48 w-56 object-cover object-center"
                                            src="https://images.pexels.com/photos/4883800/pexels-photo-4883800.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                            alt="">
                                    @else
                                        <img class="h-48 w-56 object-cover object-center"
                                            src="{{ Storage::url($servicio->images->first()->url) }}" alt="">
                                    @endif
                                </figure>

                                <div class="flex-1 py-4 px-6 flex flex-col">
                                    <div class="flex justify-between">
                                        <div class= "px-2">
                                            <h1 class="text-lg font-semibold text-gray-700"> Precio : {{ $servicio->precio }}
                                            </h1>
                                            <p class="font-bold text-trueGray-700 py-2"> Numero de pasajeros :  {{ $servicio->capacidadPersonas }}</p>
                                                <h1 class="text-medium font-thin text-gray-700"> {{ $servicio->TipoTransPrivado->nombre }}
                                        </div>
                                        <div class='mt-auto px-6 mb-4'>
                                            <x-jet-danger-button>
                                             <a href="{{route('transportePrivados.show',$servicio)}}"> Mas Informacion</a>

                                            </x-jet-danger-button>
                                        </div>
                                     
                                    </div>

                                  
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>


            @endif
            <div class="mt-4">
                {{ $servicios->links() }}
            </div>

        </div>
       



    </div>
</div>