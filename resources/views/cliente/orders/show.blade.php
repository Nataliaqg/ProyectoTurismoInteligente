<x-app-layout>
    <div class="container py-12"> {{--vista resumen de orden--}}
        <div class="bg-white rounded-lg shadow-lg px-6 py-12 mb-6 flex items-center" >

            <div class="relative">{{--primer circulo--}}
                <div class="{{ ($order->status >=2 && ($order->status!=4) ) ? 'bg-blue-400' : 'bg-gray-400'}} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-thin fa-suitcase text-white"></i>
                </div>
                <div class="absolute">
                    <p>Orden recibida</p>
                </div>
            </div>

            <div class="{{ ($order->status >=3 && ($order->status!=4) ) ? 'bg-blue-400' : 'bg-gray-400'}} h-1 flex-1 bg-blue-400 mx-2"></div> {{--linea--}}


            <div class="relative">{{--segundo circulo--}}
                <div class="{{ ($order->status >=3 && ($order->status!=4) ) ? 'bg-blue-400' : 'bg-gray-400'}} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-thin fa-suitcase text-white"></i>
                </div>
                <div class="absolute text-center -right-0">
                    <p>Paquete confirmado</p>
                </div>
            </div>
        </div>


        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
            <p class="text-gray-700 uppercase"><span class="font-semibold">Número de paquete: </span>{{$order->id}}</p>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            
                <div>
                    <p class="text-lg font-semibold uppercase">Datos de contacto</p>

                    <p class="text-sm mt-2 mb-2">Persona a nombre del paquete: {{$order->contact}}</p>
                    <p class="text-sm mb-2">Carnet: {{$order->carnet}}</p>
                    <p class="text-sm mb-2">Teléfono: {{$order->phone}}</p>
                    <p class="text-sm mb-2">Email: {{$order->email}}</p>
                </div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
            <p class="text-xl font-semibold mb-4 uppercase">Resumen del paquete</p>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    {{--MUESTRA RESUMEN DE ITEMS--}}
                    @foreach ($items as $item)
                     <tr>

                         {{--MUESTRA IMAGEN Y NOMBRE--}}
                        <td>                           
                            <div class="flex"> 
                                <img class="h-15 w-20 object-cover mr-4
                                           " src="{{$item->options->image}}" alt="">
                                <article>
                                    {{-- LUGAR TURISTICO --}}
                                     @if (($item->options->categoria_id)==1)
                                      <p class="font-bold">Entrada: {{ $item->name }}</p>
                                     @endif
                                   {{-- VIAJE --}}
                                     @if (($item->options->categoria_id)==4)
                                      <p class="font-bold">Boleto a: {{ $item->name }}</p>
                                     @endif
                                   {{-- restaurante --}}
                                     @if (($item->options->categoria_id)==3)
                                      <p class="font-bold">reserva de: {{ $item->name }}</p>
                                     @endif
                                </article>
                            </div>
                        </td>

                         {{--MUESTRA PRECIO--}}
                        <td class="text-center">
                            {{$item->price}} BS
                        </td>

                        {{--MUESTRA CANTIDAD--}}
                        <td class="text-center">
                            {{$item->qty}}
                        </td>

                        {{--MUESTRA TOTAL--}}
                        <td class="text-center">
                            {{$item->price * $item->qty}} BS
                        </td>
                     </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>