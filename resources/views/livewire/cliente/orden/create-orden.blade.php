<div class="container py-8">
 <div class="grid grid-cols-4 gap-6">

    {{--COLUMNA INPUTS Y POLITICAS--}}
    <div class="col-span-2">

        <div class="bg-white rounded-lg shadow p-6">
            <div class="mb-4">
                <x-jet-label value="Nombre de contacto" />
                <x-jet-input type="text" 
                             placeholder="Ingrese el nombre de la persona que adquirirá el paquete" 
                             class="w-full"/>
            </div>

            <div>
                <x-jet-label value="Teléfono de contacto" />
                <x-jet-input type="text" 
                             placeholder="Ingrese un número de teléfono de contacto" 
                             class="w-full"/>
            </div>
        </div>

        <div>
            <x-jet-button class="mt-6 mb-4">
                Continuar con la compra
            </x-jet-button>

            <hr> {{--politicas de privacidad--}}
            <p class="text-sm text-gray-700 mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui necessitatibus cupiditate illum voluptatem similique dolores error vitae, magni laudantium harum iste quos tempore praesentium quod quia perferendis natus molestias? Asperiores! <a href="" class="font-semibold text-red-600">Políticas y privacidad</a></p>
        </div>

    </div>

    {{--COLUMNA MUESTRA DE ITEMS Y SUBTOTAL--}}
    <div class="col-span-2"> 
        <div class="bg-cyan-700 rounded-lg shadow p-3 text-center text-white">
            Resumen del paquete
        </div>
      <div class="bg-white rounded-lg shadow p-6">
          <ul> {{--copia de mi ul de dropdown cart--}}
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
                <span class="font-semibold">{{Cart::subTotal()}} BS</span>
            </p>
            <p class="flex justify-between items-center">
                Subtotal
                <span class="font-semibold">{{Cart::subTotal()}} BS</span>
            </p>
          </div>
      </div>
    </div>


 </div>
</div>
