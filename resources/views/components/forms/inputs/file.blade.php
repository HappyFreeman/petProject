@props([
    'multiple' => false,
    'error' => null,
])
<input
    type="file"
    @class([
        'block w-full text-sm text-gray-900 border rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:placeholder-gray-400',
        'border-red-600 dark:border-red-800' => ! empty($error),
        'border-gray-300 dark:border-gray-600' => empty($error),
        $attributes->get('class'),
    ])
    {{ $attributes->except('class', 'type') }}
    @if ($multiple)
        multiple="multiple"
    @endif
>