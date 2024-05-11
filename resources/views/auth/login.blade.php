<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <main class="main w-100">
        <div class="container">
            <div class="row mb-5">
                <img class="logo_universidad" src="{{ asset('assets/logo/logo_universidad.svg') }}" alt="Logotipo Universidad Compensar">
            </div>
            <div class="row">
                <div class="col-md-8 d-flex justify-content-center align-items-center">
                    <img class="ilustacion_login" src="{{ asset('assets/vectores/ilustracion_login.svg') }}" alt="ilustracion login">
                </div>
                <div class="col-md-4 d-flex flex-column justify-content-center">
                    <h1 class="title_main">Bienvenido</h1>
                    <p class="subtitle_login">Por favor ingresa a tu cuenta</p>

                    <form method="POST" action="{{ route('login') }}" class="mt-5">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Usuario / Correo Electrónico')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="correo@ucompensar.edu.co" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Contraseña')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="■■■■■■■■" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recordar datos') }}</span>
                                </label>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                    {{ __('¿Olvidaste tu contraseña?') }}
                                </a>
                                @endif


                            </div>
                        </div>
                        <x-primary-button class="mt-3 d-block w-100 btn-login">
                            {{ __('Ingresar') }}
                        </x-primary-button>
                        <a href="{{ url('/register')}}" class="enlace_crear_cuenta">Crear cuenta</a>
                    </form>
                </div>
            </div>
        </div>
    </main>



</x-guest-layout>