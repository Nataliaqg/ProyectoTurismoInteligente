<div>
    <x-slot name="header">
        <div class=" flex items-center">
            <h2 class="font-semibold text-base text-gray-500 leading-tight">
                Bitacora
            </h2>

    </x-slot>

    <div class=" container first-line:py-12">
        <x-table-responsive>
            <div class="px-6 py-4 flex items-center">
                <div class="flex items-center">
                    <span class="mr-2 font-semibold">Buscar</span>
                    <select wire:model='buscador'
                        class="mr-2 px-6 py-3 border-gray-300 text-left text-sm rounded-lg font-medium text-black-600 uppercase tracking-wider ">
                        <option value="accion">Acción</option>
                        <option value="fecha">Fecha</option>
                        <option value="hora">Hora</option>
                    </select>

                    <span class="mr-2 font-semibold ">Paginar</span>
                    <select wire:model='pagination'
                        class="mr-2 px-6 py-3 border-gray-300 text-left text-sm rounded-lg font-medium text-black-600 uppercase tracking-wider ">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <x-jet-input type="text" class="flex-1 mr-2 rounded-full" placeholder=" Que Necesito?"
                        wire:model="search" />
                </div>
            </div>
            {{-- exiten algo en la btacora --}}
            @if ($bitacoras->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="rounded-3xl bg-gray-100">
                        <tr>
                            <th scope="col"
                                class="w-32 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('id')">
                                Código

                                @if ($sort == 'id')
                                    @if ($direction == 'asc')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7l4-4m0 0l4 4m-4-4v18" />
                                        </svg>
                                    @endif
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                @endif

                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('idUsuario')"> {{-- no lo ceo necesario --}}
                                Usuario
                            </th>

                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider"
                                wire:click="order('fecha')">
                                Fecha

                                @if ($sort == 'fecha')
                                    @if ($direction == 'asc')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7l4-4m0 0l4 4m-4-4v18" />
                                        </svg>
                                    @endif
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                @endif

                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('hora')">
                                Hora
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('accion')">
                                Acción

                                @if ($sort == 'accion')
                                    @if ($direction == 'asc')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7l4-4m0 0l4 4m-4-4v18" />
                                        </svg>
                                    @endif
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                @endif
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($bitacoras as $bitacora)
                            <tr>
                                <td class="px-6 py-4 ">
                                    <div
                                        class="px-2 inline-flex text-lx leading-10 font-semibold rounded-lg bg-white border border-t-green-600 text-gray-600">
                                        {{ $bitacora->id }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 ">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $bitacora->user->name }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">
                                        {{ $bitacora->fecha }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">
                                        {{ $bitacora->hora }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">
                                        {{ $bitacora->accion }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No hay registros
                </div>
            @endif

            @if ($bitacoras->hasPages())
                <div class="px-6 py-3">
                    {{ $bitacoras->links() }}
                </div>
            @endif

        </x-table-responsive>
    </div>
</div>
