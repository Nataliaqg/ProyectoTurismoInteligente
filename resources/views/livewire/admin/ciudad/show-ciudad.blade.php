<div>

    <x-slot name="header">
    <div class="flex items-center">
        <h2 class="font-semibold text-xl text-gray-600 leading-tight">
            Lista de Ciudades
        </h2>

        <a type="button" href="{{ route('admin.ciudad.create') }}"
        class=" absolute top-15 right-5 p-sm inline-block px-6 py-2 border-2 border-green-500 text-green-500 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
           Agregar ciudad
    </a>
    </div>
    </x-slot>


    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="container py-12">

        <x-table-responsive>

            <div class="px-6 py-4">  {{--para el buscador--}}

                <x-jet-input type="text" 
                    wire:model="search" 
                    class="w-full"
                    placeholder="Ingrese el nombre de la ciudad que quiere buscar" />

            </div>

            @if ($ciudades->count())
                
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Abreviatura
                            </th>
                            
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                            

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($ciudades as $ciudad)

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap"> {{--NOMBRE--}}
                                    <div class="flex items-center">   
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $ciudad->nombre}}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap"> {{--ABREVIATURA--}}
                                    <div class="text-sm text-gray-900">
                                        {{ $ciudad->abreviatura }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.ciudad.edit', $ciudad) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <a class="pl-2 hover:text-red-600 cursor-pointer"
                                        wire:click="$emit('deleteCiudad', {{ $ciudad->id}})">
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

            @if ($ciudades->hasPages()) 
                
                <div class="px-6 py-4">
                    {{ $ciudades->links() }}
                </div>
                
            @endif
                

        </x-table-responsive>
    </div>

    {{---------------------------------------}}

@push('script')
<script>
    Livewire.on('deleteCiudad', ciudad => {

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                Livewire.emitTo('admin.ciudad.show-ciudad', 'delete',ciudad); //directorio,el nombre del evento,parametro

                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })

    })

   
</script>
@endpush


</div>