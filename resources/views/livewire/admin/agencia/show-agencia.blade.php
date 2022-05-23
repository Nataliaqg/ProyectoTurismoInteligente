<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-600 leading-tight">
                Lista de Agencias
            </h2>

            <a type="button" href="{{ route('admin.agencia.create') }}"
                class=" absolute top-15 right-5 p-sm inline-block px-6 py-2 border-2 border-green-500 text-green-500 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                Agregar Agencia
            </a>
        </div>
    </x-slot>


    <div class="container py-12">
        <x-table-responsive>


            {{-- Buscador de Agencias --}}

            <div class="py-6 px-4">
                <x-jet-input
                wire:model="search"
                type="text"
                 class="w-full"
                 placeholder="Escriba la agencia que esta buscando"
                />
            </div>

            @if (count($agencias))

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            NOMBRE
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tipo
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

                    @foreach ($agencias as $agencia)

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap"> {{--NOMBRE--}}
                                <div class="flex items-center">   
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $agencia->id}}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap"> {{--ABREVIATURA--}}
                                <div class="text-sm text-gray-900">
                                    {{ $agencia->nombre }}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="text-sm text-gray-900">
                                    {{$agencia->tipo}}
                                </div>
                            </td>

                            
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.agencia.edit', $agencia) }}" class="text-indigo-600 hover:text-indigo-900">
                                    Editar
                                </a>

                            </td>


                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                <a class="text-red-500 hover:text-red-900 cursor-pointer"
                                    wire:click="$emit('deleteAgencia', {{$agencia->id}})">
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
            @if ($agencias->hasPages())
                <div class="px-6 py-4">
                    {{ $agencias->links() }}
                </div>    
            @endif

            
        </x-table-responsive>

    </div>

     

        @push('script')
            <script>
                Livewire.on('deleteAgencia', agencia => {

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
                            Livewire.emitTo('admin.agencia.show-agencia','delete',agencia); 
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
