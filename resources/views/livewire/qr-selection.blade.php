<div class="flex flex-col gap-8">
    <h1 class="text-4xl font-bold text-center w-full">
        Wählen sie Ihren QR-Code Typ aus
    </h1>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        @foreach($options as $option => $data)
            <x-selection-type
                :wire:key="$option"
                wire:click="select('{{$option}}')"
                :selected="$data['selected']"
            >
                <x-slot:icon>
                    <x-dynamic-component :component="$data['icon']"/>
                </x-slot>
                {{ $data['title'] }}
            </x-selection-type>
        @endforeach
    </div>
    <div class="flex flex-row items-center gap-4 cursor-not-allowed">
        <label class="relative inline-block w-16 h-8" >
            <input type="checkbox" class="opacity-0 w-0 h-0 peer" checked disabled>
            <span class="absolute cursor-not-allowed top-0 left-0 right-0 bottom-0 bg-gray-300 transition rounded-full peer-focus:ring-2 peer-checked:bg-[#4778F5]"></span>
            <span class="absolute cursor-not-allowed bg-white w-6 h-6 rounded-full bottom-1 left-1 transition-transform peer-checked:translate-x-8"></span>
        </label>
        Offline Funktionalität
    </div>
</div>
