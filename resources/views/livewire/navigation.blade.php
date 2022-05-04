<header class="bg-gray-600">
    <div class="container flex items-center h-16">
     <a class="flex flex-col items-center justify-center px-4 bg-white bg-opacity-25 text-white cursor-pointer font-semibold h-full">
        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>

        <span>Categorias</span>
     </a>

     <a href="/" class="mx-6">
        <x-jet-application-mark class="block h-9 w-auto"/>
     </a>

     @livewire('search')
     
     <!-- Settings Dropdown -->
     <div class="mx-6 relative">
         @auth
         <x-jet-dropdown align="right" width="48">
            <x-slot name="trigger">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </button>
                @else
                    <span class="inline-flex rounded-md">
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                            {{ Auth::user()->name }}

                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                @endif
            </x-slot>

            <x-slot name="content">
                <!-- Account Management -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Manage Account') }}
                </div>

                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                    {{ __('Profile') }}
                </x-jet-dropdown-link>

                @role('admin')
                    <x-jet-dropdown-link href="{{ route('admin.index') }}">
                        {{ __('Administrador') }}
                    </x-jet-dropdown-link>
                @endrole


                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                        {{ __('API Tokens') }}
                    </x-jet-dropdown-link>
                @endif

                <div class="border-t border-gray-100"></div>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-jet-dropdown-link href="{{ route('logout') }}"
                             @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-jet-dropdown-link>
                </form>
            </x-slot>
         </x-jet-dropdown>
         @else
         <x-jet-dropdown align="right" width="48">
            <x-slot name="trigger">
                <i class="fas fa-user-circle text-white text-3xl cursor-pointer"></i>
            </x-slot>

            <x-slot name="content">
                <x-jet-dropdown-link href="{{ route('login') }}">
                    {{ __('Login') }}
                </x-jet-dropdown-link>
                <x-jet-dropdown-link href="{{ route('register') }}">
                    {{ __('Register') }}
                </x-jet-dropdown-link>
            </x-slot>
         </x-jet-dropdown>
         @endauth
        
    </div>
     @livewire('dropdown-cart')
    </div>
</header>