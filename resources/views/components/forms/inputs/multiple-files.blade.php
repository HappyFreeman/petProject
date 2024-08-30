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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // ЭТУ ЕРУНДУ НАДО БУДЕТ ПЕРЕДЕЛАТЬ http code 418
    $(document).ready(function() {
        $(document).on('click', '#delete-image-btn', function() {
            let image = $(this);
            let imageId = image.val(); // Get the image id from the button's value attribute
            let confirmed = confirm('Удалить изображение?');
            if (confirmed) {
                $.ajax({
                    url: `/admin/houses/images/${imageId}`,
                    method: 'DELETE',
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                    },
                    success: function(response) {
                        if (response.success) {
                            image.parent().remove(); // Remove the image element from the DOM
                        } else {
                            //alert('Failed to delete the image.');
                        }
                    },
                    error: function(xhr) {
                        image.parent().remove(); // Remove the image element from the DOM
                        //console.log('Error:', xhr.responseText);
                    }
                });
            }
        });
    });
</script>
