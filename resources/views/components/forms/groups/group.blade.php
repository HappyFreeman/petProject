@props([
    'for',
    'error' => null,
])
<div {{ $attributes->merge(['class' => 'mb-3']) }}>
    <x-forms.groups.label for="{{ $for }}" class="">{{ $label }}</x-forms.groups.label>

    {{ $slot }}

    @if (! empty($error))
        <span class="text-danger form-text">{{ $error }}</span>
    @endif
</div>
    
