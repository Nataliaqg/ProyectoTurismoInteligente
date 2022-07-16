<div class="container py-8">
    <section class="bg-white rounded-lg shadow-lg p-6 text-gray-700">
        <h1 class="text-lg font-semibold mb-6"><i class="fas fa-suitcase"></i> MI PAQUETE</h1>

        <table class="table-auto w-full">
            <thead> {{--TITULOS DE LAS CABECERAS DE NUESTRA TABLA--}}
                <tr>
                    <th></th>
                    <th>Precio</th>
                    <th>Cant</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody> {{--CUERPO DE LA TABLA--}}
                @foreach (Cart::content() as $item)
                    <tr> {{--corresponde a una columna y los tds las filas--}}
                        <td> {{--PARA IMAGEN Y NOMBRE--}}
                            <div class="flex">
                                <img class="h-15 w-20 object-cover mr-4" src="{{$item->options->image}}" alt="">
                                <div>
                                    {{--LUGAR TURISTICO--}}
                                    @if ($item->options['categoria_id']==1)
                                     <p class="font-bold">Entrada: {{$item->name}}</p>
                                    @endif
                                    {{--VIAJE--}}
                                    @if ($item->options['categoria_id']==4)
                                    <p class="font-bold">Boleto a: {{$item->name}}</p>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td> {{--PARA EL PRECIO--}}
                            <span>{{$item->price}} BS</span>
                            <a class="ml-6 cursor-pointer hover:text-red-600">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                        <td> {{--COMPONENTES ACTUALIZACION CANTIDAD--}}
                        {{--LUGAR TURISTICO--}}
                           @if ($item->options['categoria_id']==1)
                            @livewire('cliente.s-cart.update-cart-lugar-turistico', ['rowId' => $item->rowId], key($item->rowId))
                           @endif
                        {{--VIAJE--}}
                           @if ($item->options['categoria_id']==4)
                            @livewire('cliente.s-cart.update-cart-viaje', ['rowId' => $item->rowId], key($item->rowId))
                           @endif
                        </td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</div>
