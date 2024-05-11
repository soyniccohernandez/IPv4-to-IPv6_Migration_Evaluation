<x-guest-layout>





    <main class="main w-100">
        <div class="container">
            <div class="row mb-5">
                <img class="logo_universidad" src="{{ asset('assets/logo/logo_universidad.svg') }}" alt="Logotipo Universidad Compensar">
            </div>
            <div class="row">
                <div class="col-md-8 d-flex justify-content-center align-items-center">
                    <img class="ilustacion_register" src="{{ asset('assets/vectores/ilustracion_register.svg') }}" alt="ilustracion login">
                </div>
                <div class="col-md-4 d-flex flex-column justify-content-center">
                    <h1 class="title_main">Bienvenidoo</h1>
                    <p class="subtitle_register">Regístrate Aquí</p>


                    <form method="POST" action="{{ route('register') }}" class="mt-5">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Nombre de la empresa')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Ucompensar"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Correo Electrónico')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="correo@ucompensar.edu.co" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Contraseña')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="■■■■■■■■" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="■■■■■■■■" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="">
                            <x-primary-button class="w-100 mt-3 btn-register">
                                {{ __('REGISTRAR') }}
                            </x-primary-button>
                            <a class=" d-block m-auto text-center mt-3 underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                                {{ __('¿Ya estás registrado?') }}
                            </a>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

</x-guest-layout>