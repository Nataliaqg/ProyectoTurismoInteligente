<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-600 leading-tight">
                Lista de Usuarios
            </h2>

            <a type="button" href="{{ route('admin.user.create') }}"
                class=" absolute top-15 right-5 p-sm inline-block px-6 py-2 border-2 border-green-500 text-green-500 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                Agregar Usuario
            </a>
        </div>
    </x-slot>



        <div class="container py-12">  



            <x-table-responsive>

                {{-- Buscador --}}
                <div class="px-6 py-4">

                 <x-jet-input type="text"
                    class="w-full"
                    wire:model="search"
                    placeholder="Ingrese el nombre, edad, email, telefono o edad  del Usuario que desea buscar"/>

                </div>


                  @if (count($users))
                    {{-- Tabla de Usuarios --}}
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    C.I
                                </th>
    
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Telefono
                                </th>
        
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Edad
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Rol
                                </th>
        
                                {{-- <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Editar</span>
                                </th> --}}

                            </tr>
                        </thead>
        
                        <tbody class="bg-white divide-y divide-gray-200">
        
                            @foreach ($users as $user)
        
                                <tr wire:key="{{$user->email}}">

                                   <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full object-cover"
                                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                                                {{-- src="{{ Auth::user()->profile_photo_url }}" --}}
                                                alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $user->id }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                   
                                    <td class="px-6 py-4 whitespace-nowrap">
        
                                        <div class="text-sm text-gray-900">
                                            {{$user->name}}
                                        </div>
        
                                    </td>
        
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{$user->email}}
                                        </div>
        
                                    </td>
        


                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{$user->carnetIdentidad}}
                                        </div>
        
                                    </td>
        
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{$user->telefono}}
                                        </div>
        
                                    </td>
        
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{$user->edad}}
                                        </div>
        
                                    </td>
        

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="text-sm text-gray-900">
                                            
                                            @if (count($user->roles))
                                                Admin
                                            @else
                                                Cliente
                                            @endif
        
                                        </div>
                                    </td>
                                    
                                      {{-- EDITAR --}}
                                    <td class="px-4 py-2  whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('admin.user.edit', $user) }}" class="text-indigo-600 hover:text-indigo-900">
                                            Editar
                                        </a>

                                    </td>

                                    {{-- ELIMINAR --}}
                                    <td class="px-4 py-2  whitespace-nowrap text-right text-sm font-medium">

                                        <a class="text-red-500 hover:text-red-900 cursor-pointer"
                                            wire:click="$emit('deleteUser',{{$user->id}})">
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
                                No hay ningun registro que coincida
                        </div>
                            
                        @endif

                        
                        {{-- Paginacion de Usuarios --}}
                        @if ($users->hasPages())
                    
                        <div class="px-6 py-4">
                            {{ $users->links() }}
                        </div>    

                    @endif

            </x-table-responsive>



        </div>


        @push('script')
            <script>
                Livewire.on('deleteUser', user => {

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
                            Livewire.emitTo('admin.usuario.show-user','delete',user); 
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
