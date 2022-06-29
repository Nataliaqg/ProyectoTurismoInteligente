<x-app-layout>

    <div class="container py-8">
        @foreach ($categorias as $categoria)
        <section class="mb-6">
            <div class="flex items-center mb-2">
            <h1 class="text-lg uppercase font-semibold text-gray-700">
                {{$categoria->nombre}}
            </h1>
            <a href="{{route('categories.show', $categoria)}}" class="text-blue-500 hover:text-blue-400 hover:underline ml-2 font-semibold">Ver más</a>

            
        </div>
            @livewire('cliente.categoria-servicios', ['categoria' => $categoria])
        </section>
        @endforeach
    </div>

    @push('script') {{--PARA EL DESFACE--}}
    <script>
    Livewire.on('glider',function(id){

        new Glider(document.querySelector('.glider-' + id), {
        slidesToShow: 5.5,
        slidesToScroll: 5,
        draggable: true,
        dots: '.glider-' + id + '~ .dots',
        arrows: {
           prev: '.glider-' + id + '~ .glider-prev',
           next: '.glider-' + id + '~ .glider-next'
        }
        });

    });
    </script>
    @endpush

</x-app-layout>
