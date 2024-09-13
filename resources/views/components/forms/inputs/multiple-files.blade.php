@props([
    'values' => [],
])
@if (! empty($values))
<div class="grid grid-cols-2 gap-2 mb-2">
    @foreach ($values as $value)
        {{--@dump($value->url, $value->id)--}}
        <div id="image-{{$value->id}}" class="flex relative items-center justify-center border rounded">
            <img src="{{ $value->url }}" class="max-w-full max-h-32">
            <button
                id="delete-image-btn"
                type="button"
                class="absolute top-1 right-1 text-orange"
                value="{{ $value->id }}"
            >
                <x-icons.x-circle class="w-6 h-6 text-gray-800 dark:text-white"/>
            </button>
        </div>
    @endforeach
</div>
@endif
<x-forms.inputs.file
    {{ $attributes->except('multiple') }}
    :multiple="true"
/>

@vite(['resources/js/destroyImage.js'])
