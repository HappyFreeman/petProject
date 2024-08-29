@props([
    'values' => [],
])
@if (! empty($values))
<div class="grid grid-cols-2 gap-2 mb-2">
    @foreach ($values as $value)
        <div class="flex relative items-center justify-center border rounded">
            <img src="{{ $value }}" class="max-w-full max-h-32">
            <a href="#" class="absolute top-1 right-1 text-orange">
                <x-icons.x-circle class="w-6 h-6 text-gray-800 dark:text-white"/>
            </a>
        </div>
    @endforeach
</div>
@endif
<x-forms.inputs.file
    {{ $attributes->except('multiple') }}
    :multiple="true"
/>