<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-600 leading-tight">
                Lista de Transportes
            </h2>

            <a type="button" href="{{ route('admin.transporte.create') }}"
                class=" absolute top-15 right-5 p-sm inline-block px-6 py-2 border-2 border-green-500 text-green-500 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                Agregar Transporte
            </a>
        </div>
    </x-slot>


    <div class="container py-12">
        <x-table-responsive>


            {{-- Buscador de Transportes --}}

            <div class="py-6 px-4">
                <x-jet-input
                wire:model="search"
                type="text"
                 class="w-full"
                 placeholder="Escriba el transporte que esta buscando"
                />
            </div>

            @if (count($transportes))

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID
                        </th>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            TIPO
                        </th>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Modelo
                        </th>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            DESCRIPCION
                        </th>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            CAPACIDAD MAXIMA DE ASIENTOS
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

                    @foreach ($transportes as $transporte)

                        <tr>
                            {{--NOMBRE--}}
                            <td class="px-6 py-4 whitespace-nowrap"> 
                                <div class="flex items-center">   
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $transporte->id}}
                                        </div>
                                    </div>
                                </div>
                            </td>




                              {{-- Tipo de agencia a la que pertenece --}}
                              <td class="px-6 py-4 whitespace-nowrap"> 
                                <div class="text-sm text-gray-900">
                                    @if ($transporte->tipoAgencia_id == 1)
                                        Avion
                                    @else
                                        Flota
                                    @endif
                                </div>
                            </td>

                            {{-- Modelo --}}
                            <td class="px-6 py-4 whitespace-nowrap"> 
                                <div class="text-sm text-gray-900">
                                    {{ $transporte->modelo}}
                                </div>
                            </td>

                           


                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="text-sm text-gray-900">
                                    {{$transporte->descripcion}}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="text-sm text-gray-900">
                                    {{$transporte->capacidadMaximaAsientos}}
                                </div>
                            </td>

                            
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a  href="{{ route('admin.transporte.edit', $transporte) }}" class="text-indigo-600 hover:text-indigo-900">
                                    Editar
                                </a>

                            </td>


                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                <a class="text-red-500 hover:text-red-900 cursor-pointer"
                                    wire:click="$emit('deleteTransporte', {{$transporte->id}})">
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

          {{-- Paginacion de Agencias --}}
            @if ($transportes->hasPages())
                <div class="px-6 py-4">
                    {{ $transportes->links() }}
                </div>    
            @endif

            
        </x-table-responsive>

    </div>

     

        @push('script')
            <script>
                Livewire.on('deleteTransporte', transporte => {

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "Los datos se borraran permanentemente!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, eliminar!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Livewire.emitTo('admin.transporte.show-transporte','delete',transporte); 
                            Swal.fire(
                                'Borrado!',
                                'El registro ha sido eliminado.',
                                'success'
                            )
                        }
                    })

                })

            
            </script>
        @endpush



</div>
