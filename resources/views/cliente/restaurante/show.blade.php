<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-2 gap-6">
            <div> {{--DIV SLIDER--}}
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($restaurante->images as $image)
                           
                            <li data-thumb="{{Storage::url($image->url)}}">
                                <img src="{{Storage::url($image->url)}}" />
                              </li> 

                        @endforeach
                    </ul>
                </div>
            </div>
            
                <div> {{--INFORMACION--}}
                    {{-- Nombre --}}
                    <h1 class="text-4xl font-bold text-teal-900 mt-3">{{$restaurante->nombre}}</h1>
                    {{-- TELEFONO --}}
                    <div class="flex my-5">
                        <p class="text-trueGray-700 font-semibold ml-9"><i class="fas fa-clock text-teal-600"></i> Hora apertura: {{$restaurante->horaApertura}}</p>
                        <p class="text-trueGray-700 font-semibold ml-9"><i class="fas fa-clock text-teal-600"></i> Hora cierre: {{$restaurante->horaCierre}} </p>
                    </div>
                    <div class="flex my-5">
                        <p class="text-trueGray-700 font-semibold ml-9 mr-8"><i class="fas fa-phone text-teal-600"></i> Telefono: {{$restaurante->telefono}}</p>
                        <p class="text-trueGray-700 font-semibold ml-9"><i class="fas fa-utensils text-teal-600"></i> Mesas: {{$restaurante->capacidadMaximaMesa}} </p>
                    </div>


                    {{-- Descripcion --}}
                    <div class="bg-white rounded-lg shadow-lg mb-6 mt-3 ">
                        <div class="p-4 flex items-center">
                            <span class="flex items-center justify-center h-10 w-10 rounded-full ">
                                <i class="fas fa-heart text-red-600 bg-pink-200"></i>
                            </span>
                            <div class="ml-4">
                                <p class="text-teal-600 font-semibold text-lg">Descripción:</p>
                                <p>{{$restaurante->descripcion}}</p>
                            </div>
                        </div>
                    </div>

                    {{-- DIRECCION --}}
                    <div class="bg-white rounded-lg shadow-lg mb-6 mt-3 ">
                        <div class="p-4 flex items-center">
                            <span class="flex items-center justify-center h-10 w-10 rounded-full ">
                                <i class="fas fa-location-arrow text-red-600 bg-pink-200"></i>
                            </span>
                            <div class="ml-4">
                                <p class="text-teal-600 font-semibold text-lg">Ciudad:</p>
                                <p>{{$restaurante->ciudad->nombre}}</p>
                                <p class="text-teal-600 font-semibold text-lg">Dirección:</p>
                                <p>{{$restaurante->direccion}}</p>
                            </div>
                        </div>
                    </div>

                    <h1 class="text-2xl text-center font-bold text-teal-900 mt-3">Mesas disponibles</h1>
                    @foreach ($restaurante->mesas as $mesa)
                        <div class="bg-white rounded-lg shadow-lg mb-6 mt-3 ">
                            <div class="p-4 flex items-center">
                                <span class="flex items-center justify-center h-10 w-10 rounded-full ">
                                    <i class="fas fa-utensils text-teal-600"></i>
                                </span>
                               
                                <div class="ml-4">
                                    <p class="text-teal-600 font-semibold text-lg">capacidad personas</p>
                                    <p>{{$mesa->capacidad_mesa}}</p>
                                </div>
                                <div class="ml-4">
                                    <p class="text-teal-600 font-semibold text-lg">precio reserva</p>
                                    <p>{{$mesa->precio}}</p>
                                </div>
                            </div>
                        </div>

                    @endforeach
                     {{-- @livewire('cliente.carrito.add-cart-item',['habitacion' => $habitacion]) --}}
                </div>

        </div>
    </div>


        @push('script')
            <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
                });
            });
            </script>
        @endpush
</x-app-layout>