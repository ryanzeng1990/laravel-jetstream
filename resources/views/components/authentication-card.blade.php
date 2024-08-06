<div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0">
{{--    <div>--}}
{{--        {{ $logo }}--}}
{{--        <x-diamond-territory-logo />--}}
{{--    </div>--}}

    <div class="w-full flex flex-col align-items: center sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <x-diamond-territory-logo />
        <div class="mt-10">
            {{ $slot }}
        </div>
    </div>
</div>
