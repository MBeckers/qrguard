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
                console.log(event.detail.result.url)
                $wire.dispatch('processQrCode', {url: event.detail.result.url});
            });
        </script>
    @endscript
@endpush
