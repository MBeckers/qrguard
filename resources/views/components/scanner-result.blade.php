@props([
    'valid' => true,
    'origin' => 'de',
    'company' => null,
    'domain' => 'sony.co.de',
    'link' => 'https://sony.com',
    'logo' => 'https://www.w3schools.com/images/w3schools_green.jpg'
])
<div class="absolute flex justify-start items-center w-full bottom-32 left-0 h-20">
    <div
        @class([
            'flex justify-start items-center mx-auto w-60 min-h-20 bg-white rounded-xl shadow gap-6 p-6',
            'text-black' => $valid,
            'bg-invalid text-white' => !$valid,
        ])
    >
        @if($valid)
            <img class="w-10 h-10 my-auto" src="{{ $logo }}">
        @else
            <img class="w-10 h-10 my-auto" src="{{asset('assets/qr-warning.png')}}">
        @endif
        <a href="{{ $link }}" class="items-start">
            <div class="flex justify-center items-center gap-2">
                <p class="font-bold">
                    {{ $company ?: 'Unknown' }}
                </p>
                @if($valid)
                    <x-icons.check />
                @else
                    <x-icons.invalid />
                @endif
            </div>
            <p class="opacity-70">{{ $domain }}</p>
        </a>
        <div class="cursor-pointer" wire:click="clear">
            x
        </div>
    </div>
</div>
