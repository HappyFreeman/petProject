@props([
    'error' => null,
])
<x-forms.row {{ $attributes }}>
    <div class="mt-2">
        <div>
            <label class="inline-flex items-center cursor-pointer">
                {{ $slot }}
                <span class="ml-2 text-dark">{{ $label }}</span>
            </label>
        </div>
        @if (! empty($error))
            <span class="text-danger">{{ $error }}</span>
        @endif
    </div>
</x-forms.row>