<div>
    <div class="container py-8">
        <div class="grid grid-cols-2 gap-6"> {{--defino dos columnas--}}
    
    
           <div class="col-span-1">{{--lo que entra a la izquierda--}}
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
    
    
           <div class="col-span-1">{{--lo que entra a la derecha--}}
              {{--AGREGO IMAGEN DE PAYPAL--}}
              <div class="bg-white rounded-lg shadow-lg px-6 pt-6 ">
                  <div class="flex justify-between items-center mb-4">
                    <img class="h-12" src="{{asset('img/paypal2.png')}}" alt="">
                    <div class="text-gray-700">
                        <p class="text-lg font-semibold uppercase">
                            Total a pagar: {{$order->total}} BS
                        </p>
                    </div>
                  </div>
    
                  <div id="paypal-button-container"></div>
              </div>
             
           </div>
    
    
        </div>
    </div>
    
       @push('script')
       <script src="https://www.paypal.com/sdk/js?client-id={{config('services.paypal.client_id')}}">
       </script>
    
    
       <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: "{{ $order->total }}"
                        }
                    }]
                });
            },
            onApprove: function(data, actions) { //si el pago se realiza correctamente
                return actions.order.capture().then(function(details) {
    
                    Livewire.emit('payOrder');
    
                    /* console.log(details);
    
                    alert('Transaction completed by ' + details.payer.name.given_name); */
                });
            }
        }).render('#paypal-button-container'); // Display payment options on your web page
    
       </script>
       @endpush
</div>
