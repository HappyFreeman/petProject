@props([
    'value' => null,
    'error' => null,
    'type' => 'text',
])
<input
    type="{{ $type }}"
    @class([
        'border text-sm rounded-lg block w-full p-2.5',
        'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500' => ! empty($error),
        'bg-gray-50 border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500' => empty($error),
        $attributes->get('class'),
    ])
    {{ $attributes->except('class', 'type') }}
    value="{{ $value }}"
>