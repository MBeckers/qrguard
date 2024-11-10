@props([
    'title' => 'Your Title here',
    'placeholder' => 'Your Placeholder here',
    'id' => null,
])
<div
    class="flex flex-col gap-2"
>
    <label :for="id">
        {{$title}}
    </label>
    <input
        {{ $attributes->except('class') }}
        class="border-2 rounded-xl py-2 px-3"
    >
</div>
