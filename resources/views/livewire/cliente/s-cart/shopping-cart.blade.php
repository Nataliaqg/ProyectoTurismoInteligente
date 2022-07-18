<div class="container py-8">
    <section class="bg-white rounded-lg shadow-lg p-6 text-gray-700">
        <h1 class="text-lg font-semibold mb-6"><i class="fas fa-suitcase"></i> MI PAQUETE</h1>

        @if (Cart::count()) {{-- Si tiene algun item agregado al carrito --}}
            <table class="table-auto w-full">
                <thead> {{-- TITULOS DE LAS CABECERAS DE NUESTRA TABLA --}}
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cant</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody> {{-- CUERPO DE LA TABLA --}}
                    @foreach (Cart::content() as $item)
                        <tr> {{-- corresponde a una fila y los tds las columnas --}}

                            {{-- PARA IMAGEN Y NOMBRE --}}
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}"
                                        alt="">
                                    <div>
                                        {{-- LUGAR TURISTICO --}}
                                        @if ($item->options['categoria_id'] == 1)
                                            <p class="font-bold">Entrada: {{ $item->name }}</p>
                                        @endif
                                        {{-- VIAJE --}}
                                        @if ($item->options['categoria_id'] == 4)
                                            <p class="font-bold">Boleto a: {{ $item->name }}</p>
                                        @endif
                                        {{-- restaurante --}}
                                        @if ($item->options['categoria_id'] == 3)
                                            <p class="font-bold">reserva de mesa en: {{ $item->name }}</p>
                                            <p class="font-bold">capacidad: {{ $item->options['mesa_capacidad']}}</p>
                                            <p class="font-bold"> fecha: {{ $item->options['fecha'] }}</p>
                                        @endif
                                            {{-- transporte Privado --}}
                                        @if ($item->options['categoria_id'] == 5)
                                        <p class="font-bold"> {{ $item->name }}   reservado</p>
                                        <p class="font-bold"> fecha: {{ $item->options['fecha'] }}</p>
                                    @endif
                                     {{-- hotel --}}
                                     @if ($item->options['categoria_id'] == 2)
                                     <p class="font-bold">reserva de habitacion en: {{ $item->name }}</p>
                                     <p class="font-bold">tipo: {{ $item->options['habitacion_tipo']}}</p>
                                     <p class="font-bold"> fecha: {{ $item->options['fecha'] }}</p>
                                 @endif
                                    </div>
                                </div>
                            </td>

                            {{-- PARA EL PRECIO --}}
                            <td class="text-center">
                                <span>{{ $item->price }} BS</span>
                                <a class="ml-6 cursor-pointer hover:text-red-600"
                                    wire:click="delete('{{ $item->rowId }}')"
                                    wire:loading.class="text-red-600 opacity-25"
                                    wire:target="delete('{{ $item->rowId }}')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>

                            {{-- COMPONENTES ACTUALIZACION CANTIDAD --}}
                            <td>
                                <div class="flex justify-center">
                                    {{-- LUGAR TURISTICO --}}
                                    @if ($item->options['categoria_id'] == 1)
                                        @livewire('cliente.s-cart.update-cart-lugar-turistico', ['rowId' => $item->rowId], key($item->rowId))
                                    @endif
                                    {{-- VIAJE --}}
                                    @if ($item->options['categoria_id'] == 4)
                                        @livewire('cliente.s-cart.update-cart-viaje', ['rowId' => $item->rowId], key($item->rowId))
                                    @endif
                                    {{-- restaurante --}}
                                 {{--  @if ($item->options['categoria_id'] == 3)
                                        @livewire('cliente.s-cart.update-cart-restaurante', ['rowId' => $item->rowId], key($item->rowId))
                                    @endif--}} 
                                </div>
                            </td>

                            {{-- PARA LA CANTIDAD * PRECIO --}}
                            <td class="text-center">
                                {{ $item->price * $item->qty }} BS
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a class="text-sm cursor-pointer hover:underline mt-3 inline-block" wire:click="destroy">
                <i class="fas fa-trash"></i>
                Limpiar mi paquete
            </a>
        @else
            <div class="flex flex-col items-center">
                <x-cart />
                <p class="text-lg text-gray-700 mt-4">NO HAS AGREGADO ALGÚN SERVICIO A TU PAQUETE</p>
                <x-button-enlace href="/" class="mt-4 px-16">
                    Ir al inicio
                </x-button-enlace>
            </div>
        @endif
    </section>

    @if (Cart::count())
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-700">
                        <span class="font-bold text-lg">Total:</span>
                        {{ Cart::subTotal() }} BS
                    </p>
                </div>
                <div>
                    <x-button-enlace href="{{ route('orders.create') }}">
                        Continuar
                    </x-button-enlace>
                </div>
            </div>
        </div>
    @endif
</div>
