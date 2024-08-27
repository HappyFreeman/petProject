@props([
    'value' => null,
    'error' => null,
    'type' => 'text',
])
<input
    type="{{ $type }}"
    @class([
        'form-control',
        'text-danger' => ! empty($error),
        'text-dark' => empty($error),
        $attributes->get('class'),
    ])
    {{ $attributes->except('class', 'type') }}
    value="{{ $value }}"
>