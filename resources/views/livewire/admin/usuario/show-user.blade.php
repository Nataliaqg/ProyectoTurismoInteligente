<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-600 leading-tight">
                Lista de Usuarios
            </h2>

                <a type="button" href="{{ route('users.export') }}"
                    class=" absolute top-15 right-5 p-sm inline-block px-6 py-2 border-2 border-green-500 text-green-500 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                    Exportar Usuarios EXCEL
                </a>

                {{-- <a type="button" 
                    class=" absolute top-15 right-5 p-sm inline-block px-6 py-2 border-2 border-red-500 text-red-500 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                    Exportar Usuarios PDF
                </a>
                 --}}
        </div>
    </x-slot>



        <div class="container py-12">  



            <x-table-responsive>

                {{-- Buscador --}}
                <div class="px-6 py-4">

                 <x-jet-input type="text"
                    class="w-full"
                    wire:model="search"
                    placeholder="Ingrese el nombre del Usuario que quiere buscar"/>

                </div>

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
                                    Rol
                                </th>
        
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Editar</span>
                                </th>

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
        
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="text-sm text-gray-900">
                                            
                                            @if (count($user->roles))
                                                Admin
                                            @else
                                                No tiene rol
                                            @endif
        
                                        </div>
                                    </td>
{{--                                     
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a  class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                    </td>      
         --}}
                                    
                                </tr>
        
                            @endforeach
                            <!-- More people... -->
        
                            
                        </tbody>
                    </table>


                    {{-- Links de Paginacion --}}
                <div class="px-6 py-4">
                     {{$users->links()}}
                </div>

            </x-table-responsive>





        </div>

</div>
