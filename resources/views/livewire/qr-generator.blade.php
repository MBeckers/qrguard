<div class="flex flex-col gap-4 my-auto">
    <div class="flex flex-col gap-4 ">
        <x-input
            title="Your Url:"
            wire:model="url"
            type="url"
            id="url"
            name="url"
        />
        <x-input
                title="Company Name:"
                wire:model="company"
                type="company"
                id="company"
                name="company"
        />
        <x-input
                title="Country:"
                wire:model="country"
                type="country"
                id="country"
                name="country"
    />
    </div>

    <x-button
        class="mx-auto"
        wire:click="generateQrCode"
    >
        Generate QR code
    </x-button>

    <div>
        <img class="w-96 mx-auto" src="{{ $qrCode }}">
    </div>
</div>
