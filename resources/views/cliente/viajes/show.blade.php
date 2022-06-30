<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-2 gap-6">
            <div>{{--DIV DEL SLIDER--}}
                <div class="flexslider">
                    <ul class="slides">
                     @foreach ($viaje->images as $image) 
                      <li data-thumb="{{Storage::url($image->url)}}">
                        <img src="{{Storage::url($image->url)}}" />
                      </li>
                     @endforeach
                    </ul>
                  </div>
            </div>
            <div>{{--DIV DEL CONTENIDO--}}
                <h1 class="text-4xl font-bold text-teal-900 mt-3">
                    Boleto :
                </h1>
                <div class="flex my-5"> {{--pone dos p juntos porque estan de lado--}}
                    <p class="text-trueGray-700 font-semibold text-lg">
                        @if ($viaje->transporte->agencia->tipoAgencia_id == 1)
                         <i class="fas fa-plane-departure text-teal-600"></i>
                        @else
                        <i class="fas fa-bus text-teal-600"></i>
                        @endif
                         Partida:  {{$viaje->ciudadOrigen->nombre}}
                    </p>
                    <p class="text-trueGray-700 ml-9 font-semibold text-lg">
                        @if ($viaje->transporte->agencia->tipoAgencia_id == 1)
                         <i class="fas fa-plane-arrival text-teal-600"></i>
                        @else
                        <i class="fas fa-bus text-teal-600"></i>
                        @endif
                         Destino:  {{$viaje->ciudadDestino->nombre}}
                    </p>
                </div>
                <p class="text-trueGray-700 text-lg mt-3"><i class="fas fa-calendar text-teal-600"></i>
                    Fecha: {{$viaje->fecha}}
                </p>
                <p class="text-trueGray-700 text-lg mt-3"><i class="fas fa-clock text-teal-600"></i>
                    Hora: {{$viaje->hora}}
                </p>
                <p class="text-trueGray-700 text-lg mt-3"><i class="fas fa-credit-card text-teal-600"></i>
                    Precio: {{$viaje->precio}}
                </p>
                <p class="text-trueGray-700 text-lg mt-3">
                    @if ($viaje->transporte->agencia->tipoAgencia_id == 1)
                     <i class="fas fa-plane text-teal-600"></i>
                    @else
                    <i class="fas fa-bus text-teal-600"></i>
                    @endif
                    Tipo de transporte: {{$viaje->transporte->agencia->tipoAgencia->tipoAgencia}}
                </p>
                <p class="text-trueGray-700 text-lg mt-3"><i class="fas fa-users text-teal-600"></i>
                    Agencia: {{$viaje->transporte->agencia->nombre}}
                </p>
                @if ($viaje->transporte->agencia->tipoAgencia_id ==2)
                <div class="bg-white rounded-lg shadow-lg mb-6 mt-3 ">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full ">
                            <i class="fas fa-heart text-red-600 bg-pink-200"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-teal-600 font-semibold text-lg">Descripción:</p>
                            <p>{{$viaje->transporte->descripcion}}</p>
                        </div>
                    </div>
                </div>
                @endif
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