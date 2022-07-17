<x-app-layout>
    <div class="container py-8">
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

        {{--AGREGO IMAGEN DE PAYPAL--}}
        <div class="bg-white rounded-lg shadow-lg p-6 flex justify-between items-center">
            <img class="h-12" src="{{asset('img/paypal2.png')}}" alt="">
            <div class="text-gray-700">
                <p class="text-lg font-semibold uppercase">
                    Pago: {{$order->total}} BS
                </p>
            </div>
        </div>
    </div>
</x-app-layout>