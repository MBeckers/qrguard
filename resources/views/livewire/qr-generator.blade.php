<div class="my-auto">
    <label for="url">Url:</label>
    <input
        class="border-2 rounded p-2"
        wire:model="url"
        type="url"
        id="url"
        name="url"
    >

    <label for="company">Company Name:</label>
    <input
        class="border-2 rounded p-2"
        wire:model="company"
        type="company"
        id="company"
        name="company"
    >

    <label for="Country">Country:</label>
    <input
        class="border-2 rounded p-2"
        wire:model="country"
        type="country"
        id="country"
        name="country"
    >

    <button
        class="border-2 rounded p-2"
        wire:click="generateQrCode"
    >
        Generate Url
    </button>

    <div class="pt-10 w-screen">
        <img class="w-96 mx-auto" src="{{ $qrCode }}">
    </div>
</div>
