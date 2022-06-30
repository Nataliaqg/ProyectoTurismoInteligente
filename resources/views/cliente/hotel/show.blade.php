<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-2 gap-6">
            <div>
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($hotel->images as $image)
                           
                            <li data-thumb="{{Storage::url($image->url)}}">
                                <img src="{{Storage::url($image->url)}}" />
                              </li> 

                        @endforeach
                    </ul>
                </div>
            </div>
            
                <div>
                    {{-- INFORMACION DE LOS HOTELES --}}
                    {{-- Nombre --}}
                    <h1 class="text-4xl font-bold text-teal-900 mt-3">{{$hotel->nombre}}</h1>
                    {{-- TELEFONO --}}
                    <div class="flex my-5">
                        <p class="text-trueGray-700 font-semibold"><i class="fas fa-phone text-teal-600"></i> Telefono: {{$hotel->telefono}}</p>
                        {{-- Categoria --}}
                        <p class="text-trueGray-700 font-semibold ml-9"><i class="fas fa-star text-yellow-400"></i> Categoria: {{$hotel->categoria}} Estrellas </p>
                        <p class="text-trueGray-700 font-semibold ml-9"><i class="fas fa-bed text-teal-600"></i> Habitaciones: {{$hotel->capacidadMaximaHabitacion}} </p>
                    </div>


                    {{-- Descripcion --}}
                    <div class="bg-white rounded-lg shadow-lg mb-6 mt-3 ">
                        <div class="p-4 flex items-center">
                            <span class="flex items-center justify-center h-10 w-10 rounded-full ">
                                <i class="fas fa-heart text-red-600 bg-pink-200"></i>
                            </span>
                            <div class="ml-4">
                                <p class="text-teal-600 font-semibold text-lg">Descripción:</p>
                                <p>{{$hotel->descripcion}}</p>
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
                                <p>{{$hotel->ciudad->nombre}}</p>
                                <p class="text-teal-600 font-semibold text-lg">Dirección:</p>
                                <p>{{$hotel->direccion}}</p>
                            </div>
                        </div>
                    </div>

                    <h1 class="text-2xl text-center font-bold text-teal-900 mt-3">Tipos de Habitaciones</h1>


                    @foreach ($hotel->habitaciones as $habitacion)
                        <div class="bg-white rounded-lg shadow-lg mb-6 mt-3 ">
                            <div class="p-4 flex items-center">
                                <span class="flex items-center justify-center h-10 w-10 rounded-full ">
                                    <i class="fas fa-bed text-teal-600"></i>
                                </span>
                               
                                <div class="ml-4">
                                    <p class="text-teal-600 font-semibold text-lg">Tipo</p>
                                    <p>{{$habitacion->tipo}}</p>
                                    <p class="text-teal-600 font-semibold text-lg">Cantidad</p>
                                    <p>{{$habitacion->cantidad}}</p>
                                </div>

                                <div class="ml-4">
                                    <p class="text-teal-600 font-semibold text-lg">Capacidad Personas Adultas</p>
                                    <p>{{$habitacion->capacidadPersonaAdulta}}</p>
                                    <p class="text-teal-600 font-semibold text-lg">Capacidad Personas Menores</p>
                                    <p>{{$habitacion->capacidadPersonaAdulta}}</p>
                                </div>
                                <div class="ml-4">
                                    <p class="text-teal-600 font-semibold text-lg">Precio:</p>
                                    <p>{{$habitacion->precio}} Bolivianos</p>
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