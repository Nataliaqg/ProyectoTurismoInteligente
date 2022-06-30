<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-2 gap-6">
            <div>{{--DIV DEL SLIDER--}}
                <div class="flexslider">
                    <ul class="slides">
                     @foreach ($transportePrivado->images as $image) 
                      <li data-thumb="{{Storage::url($image->url)}}">
                        <img src="{{Storage::url($image->url)}}" />
                      </li>
                     @endforeach
                    </ul>
                  </div>
            </div>
            <div>
                <h1 class="text-4xl font-bold text-teal-900 mt-3">{{$transportePrivado->tipoTransPrivado->nombre}}</h1>
                <p class="text-trueGray-700 text-lg mt-3"><i class="fas fa-users text-teal-600"></i>
                    Capacidad de personas: {{$transportePrivado->capacidadPersonas}}
                </p>
                <p class="text-trueGray-700 text-lg mt-1"><i  class="fas fa-credit-card text-teal-600"></i>
                    Precio: {{$transportePrivado->precio}} bolivianos
                </p>
                <div class="bg-white rounded-lg shadow-lg mb-2 mt-3 ">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full ">
                            <i class="fas fa-heart text-red-600 bg-pink-200"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-teal-600 font-semibold text-lg">Nota:</p>
                            <div>   
                                <p>Facilitamos el transporte de su viaje!</p>                         
                                <p>El servicio ofrece transporte privado, manteniendo limpieza, modelos nuevos, y con drivers amables, confiables y de buen trato.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg mb-2 mt-3 ">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full ">
                            <i class="fas fa-list text-red-600 bg-pink-200"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-teal-600 font-semibold text-lg">Incluye:</p>
                            <p>Un chofer designado</p>
                            <p>Medidas de seguridad</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg mb-2 mt-3 ">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full ">
                            <i class="fas fa-hand-point-right text-red-600 bg-pink-200"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-teal-600 font-semibold text-lg">Nota:</p>
                            <div>   
                                <p>Adquisición de servicio por día</p>                         
                                <p>Consta con un límite de distancia</p>
                            </div>
                        </div>
                    </div>
                </div>
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