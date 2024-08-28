@props(['messages'])
<div class="my-4">
    <div class="alert alert-danger" role="alert">
        @foreach ($messages as $message)
        <p class="mb-0">{{ $message }}</p>
        @endforeach
    </div>
</div>