@props([
    'for',
])
<label for="{{ $for }}" {{ $attributes->merge(['class' => 'dark:text-white']) }}>{{ $slot }}</label>