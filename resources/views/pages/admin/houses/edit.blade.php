<x-layouts.app
    page-title="Форма редактирования проекта"
>

<x-forms.form action="{{ route('admin.houses.update', ['house' => $house]) }}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto">
    @method('PATCH')
    <x-forms.concrete-forms-fields.admin-house-form-fields :house="$house"/>

    <x-forms.row>
        <x-forms.submit-button>Сохранить</x-forms.submit-button>
        <x-forms.cancel-button href="{{ route('admin.houses.edit', ['house' => $house]) }}">Отменить</x-forms.cancel-button>
    </x-forms.row>
</x-forms.form>

{{--
<div class="max-w-md mx-auto mt-8">
    <p class="text-base text-gray-900 dark:text-white mb-2">Дополнительные изображения в проекте</p>
    <div class="grid grid-cols-2 md:grid-cols-2 gap-2">
        @foreach ($house->images as $image)
        <div class="relative group">
            <img src="{{ $image->url }}" class="h-auto max-w-full rounded-lg">
            
            <form action="{{ route('admin.houses.images.destroy', ['image' => $image->pivot->image_id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity">
                    <x-icons.x-circle class="w-6 h-6 text-gray-800 dark:text-white"/>
                </button>
            </form>
        </div>
        @endforeach
    </div>
</div>
--}}

</x-layouts.app>