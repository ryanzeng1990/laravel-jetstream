<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('QR Code') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <x-application-logo class="block h-12 w-auto" />

                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        Welcome back {{ $user->name }}!
                    </h1>

                    <p class="mt-6 text-gray-500 leading-relaxed">
                    <div class="mt-4 p-2 inline-block bg-white">
                        <div class="md:col-span-1 flex justify-between">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium text-gray-900">{{ $user->name }}</h3>

                                <p class="mt-1 text-sm text-gray-600">
                                    {{ $user->mobile }}
                                </p>
                                <p class="mt-1 text-sm text-gray-600">
                                    {{ $user->email }}
                                </p>
                            </div>

                            <div class="px-4 sm:px-0">
                                {{--                                    {{ $aside ?? '' }}--}}
                            </div>
                        </div>
                    </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
