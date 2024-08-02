<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <x-application-logo class="block h-12 w-auto" />

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        This is Your Member QR Code
    </h1>

    <p class="mt-6 text-gray-500 leading-relaxed">
    <div class="mt-4 p-2 inline-block bg-white">
        {!! auth()->user()->getCrmQrCode() !!}
    </div>
    </p>
</div>
