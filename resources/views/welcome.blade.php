<x-app-layout>

    <div class="container py-8">
        <section>
            <h1 class="text-lg uppercase font-semibold text-gray-700">
                {{-- {{$hoteles->first()->nombre}} --}}
                HOTELES
            </h1>
            @livewire('admin.hotel.mostrar-hotel', ['hotel' => $hoteles->first()])
        </section>

        <section>
            <h1 class="text-lg uppercase font-semibold text-gray-700">
                {{-- {{$hoteles->first()->nombre}} --}}
                RESTAURANTES
            </h1>
            @livewire('admin.restaurante.mostrar-restaurante', ['restaurante' => $restaurantes->first()])

        </section>

        <section>
            <h1 class="text-lg uppercase font-semibold text-gray-700">
                LUGARES TURISTICOS
            </h1>
            @livewire('admin.lugar.mostrar-lugar-turistico', ['lugarturistico' => $lugarturisticos->first()])

        </section>
    </div>


    @push('script')
        <script>           

                new Glider(document.querySelector('.glider'), {
                    slidesToShow: 5.5,
                    slidesToScroll: 5,
                    draggable: true,
                    dots: '.dots',
                    arrows: {
                        prev: '.glider-prev',
                        next: '.glider-next'
                    }
                });
          
        </script>
        
    @endpush

</x-app-layout>
