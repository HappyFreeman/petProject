@props([
    'rows' => 3,
    'value' => null,
    'error' => null,
])
<textarea
    @class([
        'form-control',
        'text-danger' => ! empty($error),
        'text-dark' => empty($error),
        $attributes->get('class'),
    ])
    rows="{{ $rows }}"
    {{ $attributes->except('class') }}
>{{ $value }}</textarea>