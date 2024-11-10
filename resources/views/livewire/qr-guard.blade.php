@php use App\Data\SelectionType; @endphp
<div class="flex flex-col items-center">
    <div class="flex flex-col gap-8 md:w-[640px]">
        <livewire:qr-selection>

        @if($selection == SelectionType::Website->name)
            <livewire:qr-generator>
        @else
            Coming Soon
        @endif
    </div>
</div>
