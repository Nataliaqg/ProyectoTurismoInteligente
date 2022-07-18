<div class="container py-8">
    <div class="grid grid-cols-4 gap-6"> {{-- ES UNA GRID DE 4 COLUMNAS --}}

        {{-- COLUMNA INPUTS Y POLITICAS --}} {{-- AQUI ESTAMOS USANDO LAS DOS PRIMERAS COLUMNAS --}}
        <div class="col-span-2">

            <div class="bg-white rounded-lg shadow p-6">
                <div class="mb-4">
                    <x-jet-label value="Nombre de contacto" />
                    <x-jet-input type="text" wire:model.defer="contact"
                        placeholder="Ingrese el nombre de la persona que adquirirá el paquete" class="w-full" />
                    <x-jet-input-error for="contact" />
                </div>

                <div>
                    <x-jet-label value="Carnet de identidad" />
                    <x-jet-input type="text" wire:model.defer="carnet"
                        placeholder="Ingrese el carnet de la persona que adquirirá el paquete" class="w-full" />
                    <x-jet-input-error for="carnet" />
                </div>

                <div class="mt-4">
                    <x-jet-label value="Teléfono de contacto" />
                    <x-jet-input type="number" wire:model.defer="phone"
                        placeholder="Ingrese un número de teléfono de contacto" class="w-full" />
                    <x-jet-input-error for="phone" />
                </div>

                <div class="mt-4">
                    <x-jet-label value="Email" />
                    <x-jet-input type="text" wire:model.defer="email"
                        placeholder="Ingrese el email de la persona que adquirirá el paquete" class="w-full" />
                    <x-jet-input-error for="email" />
                </div>
            </div>

            <div>
                <x-jet-button wire:loading.attr="disabled" wire:target="create_order" class="mt-6 mb-4"
                    wire:click="create_order">
                    Continuar con la compra
                </x-jet-button>

                <hr> {{-- politicas de privacidad --}}
                <p class="text-sm text-gray-700 mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui
                    necessitatibus cupiditate illum voluptatem similique dolores error vitae, magni laudantium harum
                    iste quos tempore praesentium quod quia perferendis natus molestias? Asperiores! <a href=""
                        class="font-semibold text-red-600">Políticas y privacidad</a></p>
            </div>

        </div>

        {{-- COLUMNA MUESTRA DE ITEMS Y SUBTOTAL --}} {{-- AQUI ESTAMOS USANDO LAS DOS COLUMNAS QUE RESTAN --}}
        <div class="col-span-2">
            <div class="bg-cyan-700 rounded-lg shadow p-3 text-center text-white">
                Resumen del paquete
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <ul> {{-- copia de mi ul de dropdown cart --}}
                    @forelse (Cart::content() as $item)
                        <li class="flex p-2 border-b border-sky-600">
                            <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
                            <article class="flex-1">
                                @isset($item->options['categoria_id'])
                                    {{-- SI ENCUENTRA ESTA OPCION (OBVIO TODOS LOS SERVICIOS LA VAN A TENER) --}}
                                    @if ($item->options['categoria_id'] == 1)
                                        {{-- LUGAR TURISTICO --}}
                                        <h1 class="font-bold">Attracción: {{ $item->name }}</h1>
                                        <p>Entradas: {{ $item->qty }}</p>
                                        <p>Precio: {{ $item->price }} BS</p>
                                        <div>
                                    @endif
                                    @if ($item->options['categoria_id'] == 4)
                                        {{-- VIAJE --}}
                                        <h1 class="font-bold">Viaje a: {{ $item->name }}</h1>
                                        <p>Pasajes: {{ $item->qty }}</p>
                                        <p>Precio: {{ $item->price }} BS</p>
                                        <div>
                                    @endif
                                    @if ($item->options['categoria_id'] == 3)
                                        {{-- RESTAURANTE --}}
                                        <h1 class="font-bold">HOTEL: {{ $item->name }}</h1>
                                        <p>CANTIDAD: {{ $item->qty }}</p>
                                        <P>CAPACIDAD: {{ $item->options['mesa_capacidad'] }}</P>
                                        <P>fecha: {{ $item->options['fecha'] }}</P>
                                        <p>Precio: {{ $item->price }} BS</p>
                                        <div>
                                    @endif
                                    @if ($item->options['categoria_id'] == 5)
                                        {{-- transorte privado --}}
                                        <h1 class="font-bold">transporte Privado: {{ $item->name }}</h1>
                                        <p>CANTIDAD: {{ $item->qty }}</p>
                                        <P>fecha: {{ $item->options['fecha'] }}</P>
                                        <p>Precio: {{ $item->price }} BS</p>
                                        <div>
                                    @endif
                                @endisset
            </div>
            </article>
            </li>
        @empty
            <li class="py-6 px-4">
                <p class="text-center text-gray-700">
                    No tiene agregado ningún servicio en el carrito
                </p>
            </li>
            @endforelse
            </ul>

            <hr class="mt-4 mb-3">

            <div class="text-gray-700">
                <p class="flex justify-between items-center">
                    Subtotal
                    <span class="font-semibold">{{ Cart::subTotal() }} BS</span>
                </p>
            </div>
            <div class="text-gray-700 mt-3">
                <p class="flex justify-between items-center font-bold text-lg">
                    TOTAL
                    <span class="font-semibold">{{ Cart::subTotal() }} BS</span>
                </p>
            </div>
        </div>
    </div>


</div>
</div>
