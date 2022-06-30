<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-2 gap-6">
            <div> {{--DIV DEL SLIDER--}}
                <div class="flexslider">
                    <ul class="slides">
                     @foreach ($lugarTuristico->images as $image) 
                      <li data-thumb="{{Storage::url($image->url)}}">
                        <img src="{{Storage::url($image->url)}}" />
                      </li>
                     @endforeach
                    </ul>
                  </div>
            </div>
            <div> {{--AQUI ES LA COLUMNA DE INFO--}}
                <h1 class="text-4xl font-bold text-teal-900 mt-3">{{$lugarTuristico->nombre}}</h1>
                
                <div class="flex my-5"> {{--pone dos p juntos porque estan de lado--}}
                    <p class="text-trueGray-700 font-semibold"><i class="fas fa-regular fa-clock text-teal-600"></i> Hora de entrada: {{$lugarTuristico->horaEntrada}}</p>
                    <p class="text-trueGray-700 ml-9 font-semibold"><i class="fas fa-regular fa-clock text-teal-600"></i> Hora de salida: {{$lugarTuristico->horaSalida}}</p>
                </div>

                <p class="text-trueGray-700 text-lg"><i class="fas fa-credit-card text-teal-600"></i> 
                    Precio: 
                    @if ($lugarTuristico->precio == 0)
                        Entrada Libre
                    @else
                        {{$lugarTuristico->precio}} bolivianos
                    @endif
                </p>

                <div class="bg-white rounded-lg shadow-lg mb-6 mt-3 ">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full ">
                            <i class="fas fa-heart text-red-600 bg-pink-200"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-teal-600 font-semibold text-lg">Descripción:</p>
                            <p>{{$lugarTuristico->descripcion}}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg mb-6 mt-3 ">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full ">
                            <i class="fas fa-location-arrow text-red-600 bg-pink-200"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-teal-600 font-semibold text-lg">Ciudad:</p>
                            <p>{{$lugarTuristico->ciudad->nombre}}</p>
                            <p class="text-teal-600 font-semibold text-lg">Dirección:</p>
                            <p>{{$lugarTuristico->direccion}}</p>
                        </div>
                    </div>
                </div>

                @livewire('cliente.carrito.add-cart-item',['lugarTuristico' => $lugarTuristico])

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