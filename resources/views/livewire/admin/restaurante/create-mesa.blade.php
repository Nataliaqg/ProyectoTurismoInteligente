<div class="container py-12">
   

    {{-- formulario a crear--}}
    <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            Agregar nueva mesa
        </x-slot>

        <x-slot name="description">
            En esta sección podrá agregar una nueva mesa
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    capacidad mesa
                </x-jet-label>
                <x-jet-input type="number" wire:model="createForm.capacidad_mesa" class="w-full" />
                <x-jet-input-error for="createForm.capacidad_mesa" />

                <x-jet-label>
                    cantidad mesas
                </x-jet-label>
                <x-jet-input type="number" wire:model="createForm.cantidad_mesas" class="w-full" />
                <x-jet-input-error for="createForm.cantidad_mesas" />
                 <x-jet-label>
                    precio
                </x-jet-label>
                <x-jet-input type="number" wire:model="createForm.precio" class="w-full" />
                <x-jet-input-error for="createForm.precio" />
                           
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-button>
                Agregar
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    {{-- Lista de mesas --}}
    <x-jet-action-section>
        <x-slot name="title">
            Lista de mesas
        </x-slot>

        <x-slot name="description">
            Aquí encontrará todas las mesas agregadas
        </x-slot>

        <x-slot name="content">

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="border-b border-gray-300">
                    <tr class="text-left">
                     
                        <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Capacidad
                        </th>
                        
                        <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Cantidad
                        </th>
                        
                        <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        precio
                        </th>

                        <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Restaurante
                        </th>
                        <th scope="col" class="py-2">Acción</th>
                    </tr>
                  

                </thead>

                <tbody class="divide-y divide-gray-300">
                    @foreach ($mesas as $mesa)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a class="uppercase">
                                    {{$mesa->capacidad_mesa}}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a class="uppercase">
                                    {{$mesa->cantidad_mesas}}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a class="uppercase">
                                    {{$mesa->precio}}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap"> 
                                <a class="uppercase">
                                    {{$mesa->restaurante->nombre}}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex divide-x divide-gray-300 font-semibold">
                                    <a class="pr-2 hover:text-blue-600 cursor-pointer" wire:click="edit('{{$mesa->id}}')">Editar</a>
                                    <a class="pl-2 hover:text-red-600 cursor-pointer" wire:click="$emit('deleteMesa', '{{$mesa->id}}')">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </x-slot>
    </x-jet-action-section>

    {{-- Modal editar --}}
   <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            Editar Mesa
        </x-slot>

        <x-slot name="content">
            <x-jet-label>
                capacidad
            </x-jet-label>
            <x-jet-input wire:model="editForm.capacidad_mesa" type="number" class="w-full" />
            <x-jet-input-error for="editForm.capacidad_mesa" />
            <x-jet-label>
                cantidad
            </x-jet-label>
            <x-jet-input wire:model="editForm.cantidad_mesas" type="number" class="w-full" />
            <x-jet-input-error for="editForm.cantidad_mesas" />
            <x-jet-label>
                precio
            </x-jet-label>
            <x-jet-input wire:model="editForm.precio" type="number" class="w-full" />
            <x-jet-input-error for="editForm.precio" />
        </x-slot>

        <x-slot name="footer">

            <div class="justify-end items-center mt-4" >
                <x-jet-button  wire:click="open" wire:loading.attr='disabled'>
                   Cancelar
                </x-jet-button>
                
            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    @push('script')
        <script>
            Livewire.on('deleteMesa', mesaId => {
            
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

                        Livewire.emitTo('admin.restaurante.create-mesa', 'delete', mesaId)

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })

            });
        </script>
    @endpush
</div>

