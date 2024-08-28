<x-layouts.app
    page-title="Форма создания проекта"
>

<x-forms.form action="{{ route('admin.houses.store') }}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto">
    <x-forms.concrete-forms-fields.admin-house-form-fields :house="$house"/>

    <x-forms.row>
        <x-forms.submit-button>Сохранить</x-forms.submit-button>
        <x-forms.cancel-button href="{{ route('admin.houses.index') }}">Отменить</x-forms.cancel-button>
    </x-forms.row>
</x-forms.form>

</x-layouts.app>
