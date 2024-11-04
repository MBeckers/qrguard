<div>
    @if(app()->environment('local'))
        <button wire:click="simulateInvalid">simulateInvalid</button>
        <button wire:click="simulateValid">simulateValid</button>
    @endif
    @if($qrCodeUrl)
        <x-scanner-result
            :valid="$isValid"
            :domain="$baseDomain"
            :link="$qrCodeUrl"
            :company="$qrCompany"
            :origin="$qrCountry"
        />
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
