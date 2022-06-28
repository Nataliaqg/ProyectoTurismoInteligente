<div class="container py-12">
    <x-jet-form-section submit="save" class="mb-6">

            <x-slot name="title">
                Agregar nueva Habitacion
            </x-slot>

            <x-slot name="description">
                Complete la informacion necesaria para poder crear una habitacion
            </x-slot>

         
            {{-- TIPO --}}
            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Tipo
                    </x-jet-label>
                    
                    <x-jet-input wire:model="createForm.tipo" type="text" class="w-full mt-1" />
                    
                    <x-jet-input-error for="createForm.tipo" />
                </div>

                {{-- CANTIDAD --}}
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Cantidad
                    </x-jet-label>
                    
                    <x-jet-input wire:model="createForm.cantidad" type="number" class="w-full mt-1" />
                    
                    <x-jet-input-error for="createForm.cantidad" />
                </div>

                 {{-- CAPACIDAD PERSONA ADULTA --}}
                 <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Capacidad Persona Adulta
                    </x-jet-label>
                    
                    <x-jet-input wire:model="createForm.capacidadPersonaAdulta" type="number" class="w-full mt-1" />
                    
                    <x-jet-input-error for="createForm.capacidadPersonaAdulta" />
                </div>

                {{-- CAPACIDAD PERSONA MENOR --}}
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Capacidad Persona Menor
                    </x-jet-label>
                    
                    <x-jet-input wire:model="createForm.capacidadPersonaMenor" type="number" class="w-full mt-1" />
                    
                    <x-jet-input-error for="createForm.capacidadPersonaMenor" />
                </div>

                {{-- PRECIO--}}
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Precio Bs
                    </x-jet-label>
                    
                    <x-jet-input wire:model="createForm.precio" type="number" step=".01" class="w-full mt-1" />
                    
                    <x-jet-input-error for="createForm.precio" />
                </div> 
            </x-slot>



            <x-slot name="actions">
                <x-jet-button>
                    Agregar Habitacion
                </x-jet-button>
            </x-slot>
            
    </x-jet-for-section>

    <x-jet-action-section>
        <x-slot name="title">
            Lista de Habitaciones
        </x-slot>

        <x-slot name="description">
            Aqui se mostraran todas las habitaciones agregadas
        </x-slot>

        <x-slot name="content">
            <table class="text-gray-600">
                <thead class="border-b border-gray-300">
                    <tr class="text-left">

                        <th class="px-4 py-2 ">Tipo</th>
                        <th class="px-4 py-2 ">Cantidad</th>
                        <th class="px-4 py-2 ">Capacidad Persona Adulta</th>
                        <th class="px-4 py-2 ">Capacidad Persona Menor</th>
                        <th class="px-4 py-2 ">Precio</th>
                        <th  class="px-4 py-2">Accion</th>

                        {{-- <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Tipo
                        </th>
                        
                        <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Cantidad
                        </th>
                        
                        <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Capacidad Persona Adulta
                        </th>

                        <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Capacidad Persona Menor
                        </th> 
                        
                         <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Precio
                        </th> 
                        
                        <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Action
                        </th> 
                        
                        --}}
                        

                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-300">
                    @foreach ($habitaciones as $habitacion)
                        <tr>
                            <td class="px-4 py-2 whitespace-normal"> 
                                <span class="inline-block  text-center">
                                    {{$habitacion->tipo}}
                                </span>
                            </td>
                            <td class="px-4 py-2 whitespace-normal"> 
                                <span  class="inline-block text-center">
                                    {{$habitacion->cantidad}}
                                </span>
                            </td>
                            <td class="px-4 py-2 whitespace-normal"> 
                                <span  class="inline-block text-center">
                                    {{$habitacion->capacidadPersonaAdulta}}
                                </span>
                            </td>
                            <td class="px-4 py-2 whitespace-normal"> 
                                <span  class="text-center">
                                    {{$habitacion->capacidadPersonaMenor}}
                                </span>
                            </td>

                            {{-- <td class="px-4 py-2"> 
                                <span>
                                    {{$habitacion->precio}} Bs
                                </span>
                            </td> --}}

                            <td class="px-4 py-2 whitespace-normal">
                                <div class="text-sm text-gray-900">
                                    {{ $habitacion->precio}} Bs
                                </div>
                            </td>

                            <td class="py-2">
                                <div class="flex divide-x divide-gray-300 font-semibold">
                                    <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                    wire:click="edit({{$habitacion->id}})">
                                        Editar
                                    </a>
                                    <a class="pl-2 hover:text-red-600 cursor-pointer" 
                                    wire:click="$emit('deleteHabitacion',{{$habitacion->id}})">
                                        Eliminar
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>

    </x-jet-action-section>

    <x-jet-dialog-modal wire:model="editForm.open">

        <x-slot name="title">
            Editar habitacion
        </x-slot>

        <x-slot name="content">
            <div class="space-y-3">
                {{-- TIPO --}}
                <div >
                    <x-jet-label>
                        Tipo
                    </x-jet-label>
                    
                    <x-jet-input wire:model="editForm.tipo" type="text" class="w-full mt-1" />
                    
                    <x-jet-input-error for="editForm.tipo" />
                </div>

                {{-- CANTIDAD --}}
                <div >
                    <x-jet-label>
                        Cantidad
                    </x-jet-label>
                    
                    <x-jet-input wire:model="editForm.cantidad" type="number" class="w-full mt-1" />
                    
                    <x-jet-input-error for="editForm.cantidad" />
                </div>

                {{-- CAPACIDAD PERSONA ADULTA --}}
                <div >
                    <x-jet-label>
                        Capacidad Persona Adulta
                    </x-jet-label>
                    
                    <x-jet-input wire:model="editForm.capacidadPersonaAdulta" type="number" class="w-full mt-1" />
                    
                    <x-jet-input-error for="editForm.capacidadPersonaAdulta" />
                </div>

                {{-- CAPACIDAD PERSONA MENOR --}}
                <div >
                    <x-jet-label>
                        Capacidad Persona Menor
                    </x-jet-label>
                    
                    <x-jet-input wire:model="editForm.capacidadPersonaMenor" type="number" class="w-full mt-1" />
                    
                    <x-jet-input-error for="editForm.capacidadPersonaMenor" />
                </div>

                {{-- PRECIO--}}
                <div >
                    <x-jet-label>
                        Precio Bs
                    </x-jet-label>
                    
                    <x-jet-input wire:model="editForm.precio" type="number" step=".01" class="w-full mt-1" />
                    
                    <x-jet-input-error for="editForm.precio" />
                </div> 

            </div>
        </x-slot>
    

        <x-slot name="footer">
            
            <div class="justify-end items-center mt-4" >
            <x-jet-button  wire:click="open" wire:loading.attr='disabled'>
               Cancelar
            </x-jet-button>
        
            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-jet-danger-button>

        </div>
        </x-slot>

    </x-jet-dialog-modal>


        @push('script')
            <script>
                Livewire.on('saved', habitacion => {

                    Swal.fire(
                    'Creado exitosamente!',
                    'Creaste una Habitacion!',
                    'success'
                    )

                    Livewire.emitTo('admin.hotel.create-habitacion','saved',habitacion); 
                })
            </script>
        @endpush

            @push('script')
                <script>
                    Livewire.on('deleteHabitacion', habitacionId => {

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
                                Livewire.emitTo('admin.hotel.create-habitacion','delete',habitacionId); 
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
