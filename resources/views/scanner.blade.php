<x-layout>
    <x-slot name="title">
        QR Code Scanner
    </x-slot>


    <div x-data x-scanner class="container text-center w-96 mx-auto">
        <h1>QR Code Scanner</h1>

        <!-- Camera Video Feed -->
        <div class="camera-wrapper" style="position: relative; max-width: 100%; height: 70vh; margin: auto;">
            <video style="width: 100%; height: 100%; object-fit: cover;" autoplay playsinline></video>
        </div>

        <!-- Scanned QR Code Result -->
        <livewire:qr-scanner-component />
    </div>
</x-layout>
