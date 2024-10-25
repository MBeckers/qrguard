<div>
    <!-- This is the Livewire component -->
    <h2>Scanned QR Code URL</h2>
    <p>{{ $qrCodeUrl }}</p>
</div>
@push('scripts')
    @script
        <script>
          //  $wire.dispatch('processQrCode', { url: 'speekly.de' });
            window.addEventListener('qr-code-scanned', event => {
                $wire.dispatch('processQrCode', {url: event.detail.url});
            });
        </script>
    @endscript
@endpush
