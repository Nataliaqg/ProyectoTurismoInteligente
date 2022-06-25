<div>
    <x-slot name="header">
        <div class="flex items-center">
             <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                 {{ __('Rol y Usuarios') }}
             </h2>
        </div>

        <div class="flex justify-end items-center">

            <a type="button" href="{{ route('users.exportExcel') }}"
                class="inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">
                EXCEL
            </a>

            <a type="button" href="{{ route('users.exportCSV') }}" 
                class="inline-block px-6 py-2.5 bg-yellow-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-600 hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out">
                CSV
            </a>

            <a type="button" href="{{ route('users.exportODS') }}"
                class="inline-block px-6 py-2.5 bg-orange-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-orange-700 hover:shadow-lg focus:bg-orange-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">
                ODS
            </a>

            <a type="button" href="{{ route('users.exportHTML') }}"
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                HTML
            </a>

            <a type="button" href="{{ route('users.exportTSV') }}"
                class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out">
                TSV
            </a>


            <a type="button" href="{{ route('users.exportPDF') }}"
                class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                PDF
            </a>

           
             

            {{-- Version colores pobre --}}
                {{-- <a type="button" href="{{ route('users.exportExcel') }}"
                class="inline-block px-6 py-2 border-2 border-green-500 text-green-500 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                      EXCEL
                </a>

                <a type="button" href="{{ route('users.exportCSV') }}"
                 class="inline-block px-6 py-2 border-2 border-yellow-500 text-yellow-500 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                    CSV
                </a>

                <a type="button" href="{{ route('users.exportODS') }}"
                 class="inline-block px-6 py-2 border-2 border-blue-400 text-blue-400 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                   ODS
               </a>

               <a type="button" href="{{ route('users.exportTSV') }}"
               class="inline-block px-6 py-2 border-2 border-gray-800 text-gray-800 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                  TSV
              </a>


                <a type="button" href="{{ route('users.exportHTML') }}"
                 class="inline-block px-6 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                    HTML
                </a>

                <a type="button" href="{{ route('users.exportPDF') }}"
                 class="inline-block px-6 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                    PDF
                </a> --}}
    
                {{-- <a type="button" 
                    class=" absolute top-15 right-5 p-sm inline-block px-6 py-2 border-2 border-red-500 text-red-500 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                    Exportar Usuarios PDF
                </a>
                class="inline-block px-6 py-2 border-2 border-yellow-500 text-yellow-500 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                 --}}
        </div>
     </x-slot>

    <div class="container py-12">

        {{-- Tabla de usuarios --}}
        <x-table-responsive>

            <div class="px-6 py-4">

                <x-jet-input wire:model="search" type="text" class="w-full" placeholder="Escriba el usuario que desea buscar"/>

            </div>

            @if (count($users))
                
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

                       
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ($users as $user)

                        <tr wire:key="{{$user->email}}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-gray-900">
                                    {{$user->id}}
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
                                        No tiene rol
                                    @endif

                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                
                                <label>
                                    <input {{count($user->roles) ? 'checked' : ''}} value="1" type="radio" name="{{$user->email}}" wire:change="assignRole({{$user->id}}, $event.target.value)">
                                    Si
                                </label>

                                <label class="ml-2">
                                    <input {{count($user->roles) ? '' : 'checked'}} value="0" type="radio" name="{{$user->email}}" wire:change="assignRole({{$user->id}}, $event.target.value)">
                                    No
                                </label>
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
</div>
