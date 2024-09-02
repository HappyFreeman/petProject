<x-forms.groups.group for="fieldEmail" error="{{ $errors->first('email') }}">
    <x-slot:label>Email</x-slot:label>
    <x-forms.inputs.text
        id="fieldEmail"
        type="email"
        name="email"
        placeholder="example@example.com"
        required autofocus
        value="{{ old('email') }}"
        error="{{ $errors->first('email') }}"
    />
</x-forms.groups.group>
