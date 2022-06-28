<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-600 leading-tight">
                Lista de Transportes Privados
            </h2>

            <a type="button" href="{{ route('admin.transporteprivado.create') }}"
            class=" absolute top-15 right-5 p-sm inline-block px-6 py-2 border-2 border-green-500 text-green-500 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
             Agregar Transporte Privado
           </a>
            
        </div>
    </x-slot>


    <div class="container py-12">
        <x-table-responsive>

            {{-- Buscador de Transporte --}}

            <div class="py-6 px-4">
                <x-jet-input
                wire:model="search"
                type="number"
                 class="w-full"
                 placeholder="Escriba el precio del transporte privado que está buscando"
                />
            </div>

        @if ($transportePrivados->count())

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            CATEGORIA SERV
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            TIPO
                        </th>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            PRECIO
                        </th>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            CAPACIDAD DE PERSONAS
                        </th>
                        
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Editar</span>
                        </th>

                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Eliminar</span>
                        </th>

                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ($transportePrivados as $transportePrivado)

                        <tr>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        @if ($transportePrivado->images->count())
                                        <img class="h-10 w-10 rounded-full object-cover"
                                                src="{{ Storage::url($transportePrivado->images->first()->url) }}" alt="">
                                        @else
                                            <img class="h-10 w-10 rounded-full object-cover"
                                            src="https://preview.free3d.com/img/2020/08/2399393143402268166/bhzgyiii-900.jpg"
                                            alt="">
                                        @endif
                                        
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{$transportePrivado->categoria->nombre}}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap"> 
                                <div class="text-sm text-gray-900">
                                    {{ $transportePrivado->tipoTransPrivado->nombre}}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap"> 
                                <div class="text-sm text-gray-900">
                                    {{ $transportePrivado->precio}}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="text-sm text-gray-900">
                                    {{$transportePrivado->capacidadPersonas}}
                                </div>
                            </td>

                            
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a  href="{{ route('admin.transporteprivado.edit', $transportePrivado) }}" class="text-indigo-600 hover:text-indigo-900">
                                    Editar
                                </a>

                            </td>


                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                <a class="text-red-500 hover:text-red-900 cursor-pointer"
                                    wire:click="$emit('deleteTransportePriv', {{$transportePrivado->id}})">
                                       Eliminar
                                </a>
                            </td>

                        </tr>

                    @endforeach
                    <!-- More people... -->
                </tbody>
            </table>

                {{-- En caso de que no haya ningun registro que este buscando --}}
        @else

                <div class="px-6 py-4">
                        No hay ningun registro coincidente
                </div>
                
        @endif
        
        <!-- paginacion... -->
        @if ($transportePrivados->hasPages())
        <div class="px-6 py-4">
            {{ $transportePrivados->links() }}
        </div>
        @endif

        </x-table-responsive>

    </div>
    <!-- eliminar... -->
@push('script')
<script>
    Livewire.on('deleteTransportePriv', transportePrivado => {

        Swal.fire({
                    title: 'Estas Seguro?',
                    text: "Los datos se borraran permanentemente!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.transporte-priv.show-trans-priv', 'delete', transportePrivado)

                        Swal.fire(
                            'Borrado!',
                            'El registro ha sido eliminado.',
                            'success'
                        )
                    }
                })

    });
</script>
@endpush

</div>
