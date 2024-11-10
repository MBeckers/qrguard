@props([
    'as' => 'button',
])
<{{ $as }}
    {{ $attributes->class(['bg-primary text-white rounded-xl px-4 py-3']) }}
>
    {{ $slot }}
</{{ $as }}>
