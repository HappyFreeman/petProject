@props(['house'])
@csrf
<x-forms.groups.group for="fieldHouseName" error="{{ $errors->first('name') }}">
    <x-slot:label>Название проекта</x-slot:label>
    <x-forms.inputs.text
        id="fieldHouseName"
        placeholder="Stinger"
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