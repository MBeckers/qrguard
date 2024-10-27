<div>
    <!-- This is the Livewire component -->
    <h2>Scanned QR Code URL</h2>
    @if($qrCodeUrl)
        <a href="{{$qrCodeUrl}}" >{{ $qrCodeUrl }}</a>
    @endif

    @if($qrCountry)
        <p> Country: {{ $qrCountry }}</p>
    @endif

    @if($qrCompany)
        <p> Company: {{ $qrCompany }}</p>
    @endif

    @if($isValid)
        Check
    @else
        Invalid
    @endif
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
