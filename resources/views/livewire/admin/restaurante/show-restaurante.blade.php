<div>
    <x-slot name="header">
        <div class=" flex items-center">
            <h2 class="font-semibold text-base text-gray-500 leading-tight">
                lista de Restaurantes
            </h2>
            <a type="button" href="{{ route('admin.restaurante.create') }}"
                class=" absolute top-15 right-5 p-sm inline-block px-6 py-2 border-2 border-green-500 text-green-500 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                agregar un nuevo restaurante
            </a>

    </x-slot>

    <div class=" container first-line:py-12">
        <!--el slot definido en componetes/table-resposive-->
        <x-table-responsive>
            <!--el buscador-->
            <div class="px-6 py-4">
                <x-jet-input type="text" wire:model="search" class="w-full"
                    placeholder="Ingrese el nombre de restaurante  a buscar" />
            </div>

            @if ($restaurantes->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <!--la cabecera de la tabla-->
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                descripcion
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                direccion
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                telefono
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                hora Apertura
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                hora cierre
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ciudad
                            </th>



                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">eliminar</span>
                            </th>

                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($restaurantes as $restaurante)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            @if ($restaurante->images->count())
                                            <img class="h-10 w-10 rounded-full object-cover"
                                                    src="{{ Storage::url($restaurante->images->first()->url) }}" alt="">
                                            @else
                                                <img class="h-10 w-10 rounded-full object-cover"
                                                src="https://images.pexels.com/photos/4883800/pexels-photo-4883800.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                                alt="">
                                            @endif
                                            
                                        </div>

                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $restaurante->nombre }}
                                            </div>
                                        </div>
                                    </div>
                                </td>


                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $restaurante->descripcion }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $restaurante->direccion }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $restaurante->telefono }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $restaurante->horaApertura }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $restaurante->horaCierre }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">

                                        {{ $restaurante->ciudad->nombre }}
                                    </div>
                                </td>



                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.restaurante.edit', $restaurante) }}"
                                        class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a class="pl-2 hover:text-red-600 cursor-pointer"
                                        wire:click="$emit('deleteRestaurante', {{ $restaurante->id }})">
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No hay ningún registro coincidente
                </div>
            @endif

            <!-- paginacion... -->
            @if ($restaurantes->hasPages())
                <div class="px-6 py-4">
                    {{ $restaurantes->links() }}
                </div>
            @endif
        </x-table-responsive>

    </div>
    <!-- eliminar... -->
    @push('script')
        <script>
            Livewire.on('deleteRestaurante', restauranteId => {

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

                        Livewire.emitTo('admin.restaurante.show-restaurante', 'delete2', restauranteId)

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
