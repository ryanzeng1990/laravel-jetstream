<x-guest-layout>
    <x-authentication-card class="container">
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <div class="container px-4 mx-auto">
            <div class="max-w-lg mx-auto">
                <div class="text-center mb-6">
                    <h2 class="text-3xl md:text-4xl font-extrabold">Log in</h2>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-label for="email" class="block mb-2 font-extrabold" value="{{ __('Email') }}" />
                        <x-input id="email" class="inline-block w-full p-4 leading-6 text-lg font-extrabold bg-white shadow border-2 rounded" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" class="block mb-2 font-extrabold" value="{{ __('Password') }}" />
                        <x-input id="password" class="inline-block w-full p-4 leading-6 text-lg font-extrabold bg-white shadow border-2 rounded" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class='block mt-4'>
                        <x-button class="inline-block w-full py-4 px-6 mb-6 text-center text-lg leading-6 text-white font-extrabold hover:bg-indigo-900 border-3 border-indigo-900 shadow rounded transition duration-200">
                            {{ __('Log in') }}
                        </x-button>
                    </div>

                    <div class="flex justify-between">
                        <div class="justify-start mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </div>

                        <div class="justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </x-authentication-card>
</x-guest-layout>
