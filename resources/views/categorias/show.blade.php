<x-app-layout>

    <div class="container py-8">

        {{$categoria}}


        @livewire('cliente.categoria-filtro', ['categoria' => $categoria])

    </div>

</x-app-layout>
