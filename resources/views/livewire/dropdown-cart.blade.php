<div>
    <x-jet-dropdown width="96">
        <x-slot name="trigger">
            <span class="relative inline-block cursor-pointer">
                <x-cart color="white" size="30" />

                @if (Cart::count())
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">{{ Cart::count() }}</span>
                @else
                <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span></span>    
                @endif

                
                
            </span>
        </x-slot>
        <x-slot name="content">

            <ul>
                @forelse (Cart::content() as $item)
                    <li class="flex p-2 border-b border-sky-600">
                        <img class="h-15 w-20 object-cover mr-4" src="{{$item->options->image}}" alt="">
                        <article class="flex-1">
                            @isset($item->options['categoria_id']) {{--SI ENCUENTRA ESTA OPCION (OBVIO TODOS LOS SERVICIOS LA VAN A TENER)--}}
                                @if ($item->options['categoria_id']==1) {{--LUGAR TURISTICO--}}
                                  <h1 class="font-bold">Attracción: {{$item->name}}</h1>
                                  <p>Entradas: {{$item->qty}}</p>
                                  <p>Precio: {{$item->price}} BS</p>
                                  <div>
                                @endif
                                @if ($item->options['categoria_id']==4) {{--VIAJE--}}
                                  <h1 class="font-bold">Viaje a: {{$item->name}}</h1>
                                  <p>Pasajes: {{$item->qty}}</p>
                                  <p>Precio: {{$item->price}} BS</p>
                                  <div>
                                @endif
                                @if ($item->options['categoria_id']==3) {{--RESTAURANTE--}}
                                <h1 class="font-bold">RESTAURANTE: {{$item->name}}</h1>
                                <p>MESAS : {{$item->qty}}</p>
                                <p>Precio: {{$item->price}} BS</p>
                                <p>capacidad: {{$item->options['mesa_capacidad']}} </p>
                                <p>capacidad: {{$item->options['fecha']}} </p>
                                <div>
                              @endif

                              @if ($item->options['categoria_id']==5) {{--transporte Privado--}}
                              <h1 class="font-bold">transporte: {{$item->name}}</h1>
                              <p>fecha: {{$item->options['fecha']}}</p>
                              <p>Precio: {{$item->price}} BS</p>
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

            @if (Cart::count())
                <div class="p-2">
                    <p class="text-lg text-red-500 mt-1 mb-3"><span class="font-bold">Total:</span> {{Cart::subtotal()}} BS</p>

                    <x-button-enlace href="{{route('shopping-cart')}}" class="w-full">
                        Ver mi paquete
                    </x-button-enlace>

                </div>
            @endif
            
        </x-slot>
    </x-jet-dropdown>
</div>
