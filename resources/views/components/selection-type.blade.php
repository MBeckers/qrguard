@props([
    'selected' => false,
])
<div
    {{ $attributes }}
    @class([
        "flex gap-2 rounded-xl p-4 border cursor-pointer",
        "border-black" => $selected,
        "border-gray-200" => !$selected,
    ])
>
    <div>
        {{ $icon }}
    </div>

    <div>
        {{ $slot }}
    </div>
</div>
