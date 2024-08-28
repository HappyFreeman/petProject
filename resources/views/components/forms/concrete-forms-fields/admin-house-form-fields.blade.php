@props(['house'])
@csrf
<x-forms.groups.group for="fieldHouseName" error="{{ $errors->first('name') }}">
    <x-slot:label>Название проекта</x-slot:label>
    <x-forms.inputs.text
        id="fieldHouseName"
        placeholder="Какой то адрес"
        name="name"
        value="{{ old('name', $house->name) }}"
        error="{{ $errors->first('name') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldHouseMainImage" error="{{ $errors->first('image') }}">
    <x-slot:label>Основное изображение проекта</x-slot:label>
    <x-forms.inputs.one-file 
        id="fieldHouseMainImage"
        name="image"
        error="{{ $errors->first('image') }}"
        value="{{ $house->imageUrl }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldHouseDays" error="{{ $errors->first('days') }}">
    <x-slot:label>Дней стройки</x-slot:label>
    <x-forms.inputs.text
        id="fieldHouseDays"
        placeholder="68"
        name="days"
        value="{{ old('days', $house->days) }}"
        error="{{ $errors->first('days') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldHouseArea" error="{{ $errors->first('area') }}">
    <x-slot:label>Площадь</x-slot:label>
    <x-forms.inputs.text
        id="fieldHouseArea"
        placeholder="120"
        name="area"
        value="{{ old('area', $house->area) }}"
        error="{{ $errors->first('area') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldHouseAdditionalImages" error="{{ $errors->first('images') }}">
    <x-slot:label>Дополнительные изображения проекта</x-slot:label>
    <x-forms.inputs.multiple-files
        id="fieldHouseAdditionalImages"
        name="images[]"
        error="{{ $errors->first('images') }}"
        :values="$house->images->pluck('url')->all()"
    />
</x-forms.groups.group>