<x-layout>
    <x-slot name="title">
        QR Code Scanner
    </x-slot>

    <livewire:qr-scanner-component />

    <div x-data x-scanner class="container text-center">
        <h1>QR Code Scanner</h1>

        <!-- Camera Video Feed -->
        <div class="camera-wrapper" style="position: relative; max-width: 100%; height: 70vh; margin: auto;">
            <video style="width: 100%; height: 100%; object-fit: cover;" autoplay playsinline></video>
        </div>

        <!-- Scanned QR Code Result -->
        <div class="mt-3">
            <h2>Scanned QR Code:</h2>
            <p class="output">
            No QR code detected yet.
            </p>
        </div>


    </div>
</x-layout>
