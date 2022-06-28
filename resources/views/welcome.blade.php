<x-app-layout>

    <div class="container py-8">
        @foreach ($categorias as $categoria)
        <section class="mb-6">
            <h1 class="text-lg uppercase font-semibold text-gray-700">
                {{$categoria->nombre}}
            </h1>
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
        dots: '.dots',
        arrows: {
           prev: '.glider-prev',
           next: '.glider-next'
        }
        });

    });
    </script>
    @endpush

</x-app-layout>
