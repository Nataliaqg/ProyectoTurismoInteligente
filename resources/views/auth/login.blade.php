<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#0ed3cf">
    <meta name="msapplication-TileColor" content="#0ed3cf">
    <meta name="theme-color" content="#0ed3cf">

    <meta property="og:image" content="https://tailwindcomponents.com/storage/1761/temp99546.png?v=2022-05-09 20:51:33" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="640" />
    <meta property="og:image:type" content="image/png" />

    <meta property="og:url" content="https://tailwindcomponents.com/component/tela-de-login/landing" />
    <meta property="og:title" content="Tela de login by wesllycode" />
    <meta property="og:description" content="Tela de login de exemplo" />

   
    <title>Iniciar Sesión </title>

    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />

            <link href="https://unpkg.com/tailwindcss@1.9.0/dist/tailwind.min.css" rel="stylesheet">
      <script
        src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
        defer
      ></script>
    <script src="{{'/js/init-alpine.js'}}"></script>
    </head>

  <body class="bg-gray-200">
   
    <!-- This is an example component -->
                <div class="h-screen font-sans login bg-cover">
                <div class="container mx-auto h-full flex flex-1 justify-center items-center">
                <div class="w-full max-w-lg">
                <div class="leading-loose">


                {{-- Validaciones, falta ponerlo en español y darle estilos --}}
                    <x-jet-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                {{-- INICIO DEL FORMULARIO --}}

                <form method="POST" action="{{ route('login') }}" class="max-w-sm m-4 p-10 bg-black bg-opacity-25 rounded shadow-xl">
                @csrf

                        {{-- TITULO DEL FORMULARIO --}}
                    <h1
                        class="mb-4 text-xl font-semibold text-center text-gray-900 dark:text-gray-200"
                        >
                        {{ __('Iniciar Sesión') }}
                    </h1>


                        {{-- INPUT CORREO ELECTRONICO --}}

                    <div class="">
                        <label class="block text-sm text-black" for="email">Correo</label>
                        <input 
                        class="w-full px-5 py-1 text-gray-700 bg-white rounded focus:outline-none focus:bg-white form-input" 
                        type="email" id="email"  placeholder="Escriba su correo" name="email" required 
                        value="{{ old('email') }}"
                        >

                            {{-- INPUT CONTRASEÑA --}}

                        </div>
                            <div class="mt-2">
                            <label class="block  text-sm text-black">Contraseña</label>
                            <input 
                            class="w-full px-5 py-1 text-gray-700 bg-white rounded focus:outline-none focus:bg-white form-input"
                            type="password" id="password" placeholder="Escriba su Contraseña" name="password" required>
                        </div>

                    {{-- <div class="mt-4 items-center flex justify-between"> --}}

                            {{-- BOTON ENTRAR  --}}

                        <hr class="my-4" />
                        <div class="text-center">
                            <button class="px-16 py-1 text-white font-light tracking-wider bg-gray-900 hover:bg-gray-800 rounded"
                            type="submit">
                                Entrar
                            </button>
                        </div>

                            {{-- ENLACE TE OLVIDADES TU CONTRASEÑA --}}
                        <p class="mt-1"> 
                                <a class="inline-block  align-baseline font-bold text-sm text-500 text-gray-200 hover:text-red-700"
                                href="{{route('password.request')}}"> 
                                ¿Olvidaste tu Contraseña?
                                </a>
                        </p>


                            {{-- ENLACE CREAR CUENTA O REGISTRO --}}

                            <p class="mt-1">
                                <a class="inline-block right-0 align-baseline font-bold text-base text-gray-300 text-red hover:text-red-700"
                                href="{{route('register')}}"
                                >
                                Crear una cuenta
                                </a>
                            </p>

                </form>

            </div>
            </div>
        </div>
        </div>
            <style>
                .login{
                /*
                    background: url('https://tailwindadmin.netlify.app/dist/images/login-new.jpeg');
                */
                /* background: url('https://th.bing.com/th/id/R.b977c9409b62ec03acb8db019470439b?rik=XmkZEz62XhdTAA&pid=ImgRaw&r=0'); */

                /* OPCIONES DE IMAGENES DE FONDOS PARA LAS VISTAS DE LOGIN, REGISTRO */
                /* background: url('https://th.bing.com/th/id/R.b977c9409b62ec03acb8db019470439b?rik=XmkZEz62XhdTAA&pid=ImgRaw&r=0'); */
                /* background: url('https://www.10wallpaper.com/wallpaper/3840x2400/2005/Salar_de_Uyuni_Bolivia_2020_Bing_HD_Desktop_3840x2400.jpg'); */
                /* background: url('https://sonurai.com/_next/image?url=https:%2F%2Fimages.sonurai.com%2FCactiIslaPescado_ROW12625882481.jpg&w=880&q=75'); */
                background: url('https://www.10wallpaper.com/wallpaper/3840x2400/2005/Salar_de_Uyuni_Bolivia_2020_Bing_HD_Desktop_3840x2400.jpg');
                background-repeat: no-repeat;
                background-size: cover;
                }
            </style>
    </body>
</html>








{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

      

        <!-- no  borrar-->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>

    </x-jet-authentication-card>
</x-guest-layout> --}}
