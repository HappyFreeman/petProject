@props(['messages'])
<div class="my-4">
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        @foreach ($messages as $message)
        <p class="mb-0">{{ $message }}</p>
        @endforeach
    </div>
</div>