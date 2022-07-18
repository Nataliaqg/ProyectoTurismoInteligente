<x-app-layout>
    <div class="container py-12">
        {{--MUESTRA LAS TARJETITAS--}}
        <section class="grid grid-cols-4 gap-6 mb-4">

                <a href="{{route('orders.index') . "?status=1"}}" >
                    <div class="bg-cyan-600 rounded-lg px-12 pt-8 pb-4"> {{--primer div--}}
                        <p class="text-center text-2xl">
                            {{$pendiente}} 
                        </p>
                        <p class="uppercase text-center">Lista de deseos</p>
                        <p class="text-center text-2xl mt-2">
                            <i class="fas fa-clock"></i>
                        </p>
                    </div>
                </a>

                <a href="{{route('orders.index') . "?status=2"}}" >
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

                <a href="{{route('orders.index') . "?status=3"}}" >
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

                <a href="{{route('orders.index') . "?status=4"}}" >
                    <div class="bg-cyan-600 rounded-lg px-12 pt-8 pb-4"> {{--primer div--}}
                        <p class="text-center text-2xl">
                            {{$anulado}} 
                        </p>
                        <p class="uppercase text-center">Anulado</p>
                        <p class="text-center text-2xl mt-2">
                            <i class="fas fa-ban"></i>
                        </p>
                    </div>
                </a>
        </section>

        <section class="bg-white shadow-lg rounded-lg px-12 py-8 mt-13 text-gray-700">
            <h1 class="text-2xl mb-4">Paquetes recientes: </h1>

            <ul>
                @foreach ($orders as $order)
                    <li>
                        <a href="{{route('orders.show',$order)}}" class="flex items-center py-2 px-4 hover:bg-gray-100">
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


    </div>
</x-app-layout>