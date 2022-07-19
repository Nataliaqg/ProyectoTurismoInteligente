<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-600 leading-tight">
                Lista de Ordenes- Paquetes
            </h2>
        </div>

        <div class="flex justify-end items-center">
            
            <a type="button" href="{{ route('reportes.paquetesCSV') }}" 
                class="inline-block px-6 py-2.5 bg-yellow-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-600 hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out">
                CSV
            </a>

            <a type="button" href="{{ route('reportes.paquetesODS') }}"
                class="inline-block px-6 py-2.5 bg-orange-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-orange-700 hover:shadow-lg focus:bg-orange-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">
                ODS
            </a>

            <a type="button" href="{{ route('reportes.paquetesHTML') }}"
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                HTML
            </a>

            <a type="button" href="{{ route('reportes.paquetesTSV') }}"
                class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out">
                TSV
            </a>

            <a type="button" href="{{ route('reportes.paquetes') }}" 
                class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                PDF
            </a>
            
            <a type="button" href="{{ route('reportes.paquetesEXCEL') }}" 
                class="inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">
                EXCEL
            </a>
        </div>
    </x-slot>

    <div class="container py-12">
        {{--MUESTRA LAS TARJETITAS--}}
        <section class="grid grid-cols-2 gap-6 mb-4">

                <a href="{{route('admin.orders.index') . "?status=2"}}" >
                    <div class="bg-cyan-600 rounded-lg px-12 pt-8 pb-4"> {{--primer div--}}
                        <p class="text-center text-2xl">
                            {{$recibido}} 
                        </p>
                        <p class="uppercase text-center">Recibido</p>
                        <p class="text-center text-2xl mt-2">
                            <i class="fas fa-check"></i>
                        </p>
                    </div>
                </a>

                <a href="{{route('admin.orders.index') . "?status=3"}}" >
                    <div class="bg-cyan-600 rounded-lg px-12 pt-8 pb-4"> {{--primer div--}}
                        <p class="text-center text-2xl">
                            {{$confirmado}} 
                        </p>
                        <p class="uppercase text-center">Confirmado</p>
                        <p class="text-center text-2xl mt-2">
                            <i class="fas fa-heart"></i>
                        </p>
                    </div>
                </a>

               
        </section>

       @if ($orders->count()) {{--si existen ordenes--}}
       <section class="bg-white shadow-lg rounded-lg px-12 py-8 mt-13 text-gray-700">
        <h1 class="text-2xl mb-4">Paquetes recientes: </h1>

        <ul>
            @foreach ($orders as $order)
                <li>
                    <a href="{{route('admin.orders.show',$order)}}" class="flex items-center py-2 px-4 hover:bg-gray-100">
                        <span class="w-12 text-center">
                            @switch($order->status)
                                @case(1)
                                    <i class="fas fa-clock"></i>
                                    @break
                                @case(2)
                                    <i class="fas fa-check"></i>
                                    @break
                                @case(3)
                                    <i class="fas fa-heart"></i>
                                    @break

                                @case(4)
                                    <i class="fas fa-ban"></i>
                                    @break
                            
                                @default
                                    
                            @endswitch
                        </span>

                        <span>
                            Orden paquete: {{$order->id}}
                            <br>
                            Fecha creación: {{$order->created_at->format('d/m/Y')}}
                        </span>

                        <div class="ml-auto text-center">
                            <span class=" font-bold">
                                @switch($order->status)
                                    @case(1)
                                        Pendiente
                                        @break

                                    @case(2)
                                        Recibido
                                        @break

                                    @case(3)
                                        Confirmado
                                        @break

                                    @case(4)
                                        Anulado
                                        @break
                                
                                    @default
                                        
                                @endswitch
                            </span>

                            <br>

                            <span class="text-sm">
                            Total paquete: {{$order->total}} BS
                            </span>
                        </div>

                        <span>
                            <i class="fas fa-angle-right ml-6"></i>
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
       </section>
       @else
           <div class="bg-white shadow-lg rounded-lg px-12 py-8 mt-13 text-gray-700">
              <span class="font-bold text-lg">
                No existen registro de ordenes
              </span>
           </div>
       @endif


    </div>
</div>
