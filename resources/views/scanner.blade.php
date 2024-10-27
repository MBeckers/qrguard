<x-layout>
    <x-slot name="title">
        QR Code Scanner
    </x-slot>

    <div x-data x-scanner class="container text-center w-96 mx-auto">
        <h1>QR Code Scanner</h1>

        <!-- Camera Video Feed -->
        <div class="camera-wrapper relative mx-auto w-96 h-auto">
            <video class="object-cover" autoplay playsinline></video>
        </div>

        <!-- Scanned QR Code Result -->
        <livewire:qr-scanner-component />
    </div>
</x-layout>
