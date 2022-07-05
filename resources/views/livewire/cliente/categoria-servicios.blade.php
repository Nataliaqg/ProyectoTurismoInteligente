<div wire:init="loadPosts">
    @if (count($lugarTuristicos)||count($viajes)||count($restaurantes)||count($hotels)||count($transportePrivados)) {{--Pregunta si tiene registros, o sea, si el array no esta vacio--}}
      <div class="glider-contain">
        <ul class="glider-{{$categoria->id}}"> {{--etiqueta que se muestra justo despues de cargar en el if--}}
            @foreach ($lugarTuristicos as $lugarTuristico)
                <li class="bg-white rounded-lg shadow {{$loop->last ? '' : 'mr-4'}}">
                  <article>
                    <figure>
                        @if ($lugarTuristico->images->first()== null)
                            <img class="h-48 w-56 object-cover object-center"
                            src="https://images.pexels.com/photos/4883800/pexels-photo-4883800.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                            alt="">
                          @else
                          <img class="h-48 w-full object-cover object-center" src="{{ Storage::url($lugarTuristico->images->first()->url) }}" alt="">
                        @endif
                    </figure>
                    <div class="py-4 px-6">
                        <h1 class="text-lg font-semibold">
                            <a href="{{route('lugaresTuristicos.show',$lugarTuristico)}}"> {{--ruta de cada uno--}}
                                {{Str::limit($lugarTuristico->nombre,25)}}
                            </a>
                        </h1>
                        <p class="font-bold text-trueGray-700">Ciudad: {{$lugarTuristico->ciudad->nombre}}</p>
                    </div>
                  </article>
                </li>
            @endforeach
            @foreach ($viajes as $viaje)
                <li class="bg-white rounded-lg shadow {{$loop->last ? '' : 'mr-4'}}">
                  <article>
                    <figure>
                        @if ($viaje->images->first()== null)
                            <img class="h-48 w-56 object-cover object-center"
                            src="https://thumbs.dreamstime.com/b/pares-de-boletos-azules-en-blanco-de-la-pel%C3%ADcula-o-de-la-rifa-aislados-en-el-ccb-blanco-78484952.jpg"
                            alt="">
                          @else
                          <img class="h-48 w-full object-cover object-center" src="{{ Storage::url($viaje->images->first()->url) }}" alt="">
                        @endif
                    </figure>
                    <div class="py-4 px-6">
                        <h1 class="text-lg font-semibold">
                            <a href="{{route('viajes.show',$viaje)}}">
                                <p>Ciudad Destino: {{$viaje->ciudadDestino->nombre}}</p>
                            </a>
                        </h1>
                        {{--<p class="font-bold text-trueGray-700">Ciudad: {{$viaje->ciudad->nombre}}</p>--}}
                    </div>
                  </article>
                </li>
            @endforeach
            @foreach ($restaurantes as $restaurante)
              <li class="bg-white rounded-lg shadow {{$loop->last ? '' : 'mr-4'}}">
              <article>
                <figure>
                    @if ($restaurante->images->first()== null)
                        <img class="h-48 w-56 object-cover object-center"
                        src="https://www.enter.co/wp-content/uploads/2017/02/menu-restaurant-vintage-tableFINAL.jpg"
                        alt="">
                      @else
                      <img class="h-48 w-full object-cover object-center" src="{{ Storage::url($restaurante->images->first()->url) }}" alt="">
                    @endif
                </figure>
                <div class="py-4 px-6">
                    <h1 class="text-lg font-semibold">
                        <a href="{{route('restaurantes.show',$restaurante)}}">
                            {{Str::limit($restaurante->nombre,25)}}
                        </a>
                    </h1>
                    <p class="font-bold text-trueGray-700">Ciudad: {{$restaurante->ciudad->nombre}}</p>
                </div>
              </article>
              </li>
            @endforeach

            {{-- Hoteles --}}
            @foreach ($hotels as $hotel)
              <li class="bg-white rounded-lg shadow {{$loop->last ? '' : 'mr-4'}}">
              <article>
                <figure>
                    @if ($hotel->images->first()== null)
                        <img class="h-48 w-56 object-cover object-center"
                        src="https://www.detectahotel.com/himg/62/c0/84/ice-85676218-68620422_3XL-430714.jpg"
                        alt="">
                      @else
                      <img class="h-48 w-full object-cover object-center" src="{{ Storage::url($hotel->images->first()->url) }}" alt="">
                    @endif
                </figure>
                <div class="py-4 px-6">
                    <h1 class="text-lg font-semibold">
                      <a href="{{route('hotel.show',$hotel)}}">
                            {{Str::limit($hotel->nombre,25)}}
                        </a>
                    </h1>
                    <p class="font-bold text-trueGray-700">Ciudad: {{$hotel->ciudad->nombre}}</p>
                </div>
              </article>
              </li>
            @endforeach
            
            @foreach ($transportePrivados as $transportePrivado)
                <li class="bg-white rounded-lg shadow {{$loop->last ? '' : 'mr-4'}}">
                  <article>
                    <figure>
                        @if ($transportePrivado->images->first()== null)
                            <img class="h-48 w-56 object-cover object-center"
                            src="https://preview.free3d.com/img/2020/08/2399393143402268166/bhzgyiii-900.jpg"
                            alt="">
                          @else
                          <img class="h-48 w-full object-cover object-center" src="{{ Storage::url($transportePrivado->images->first()->url) }}" alt="">
                        @endif
                    </figure>
                    <div class="py-4 px-6">
                        <h1 class="text-lg font-semibold">
                            <a href="{{route('transportePrivados.show',$transportePrivado)}}">
                                {{Str::limit($transportePrivado->precio,25)}}BS
                            </a>
                        </h1>
                        <p class="font-bold text-trueGray-700">Tipo: {{$transportePrivado->tipoTransPrivado->nombre}}</p>
                    </div>
                  </article>
                </li>
            @endforeach
        </ul>
        <button aria-label="Previous" class="glider-prev">«</button>
        <button aria-label="Next" class="glider-next">»</button>
        <div role="tablist" class="dots"></div>
      </div>
    @else {{--MUESTRA UNA CARGA SI ESTA VACIO--}}
      <div class="mb-4 h-48 flex justify-center items-center bg-white shadow-xl border border-gray-100 rounded-lg">
        <div class="rounded animate-spin ease duration-300 w-10 h-10 border-2 border-indigo-500"></div>
      </div>
    @endif
</div>
