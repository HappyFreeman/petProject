@props([
    'withConfirmation' => false,
])
<x-forms.groups.group for="fieldPassword" error="{{ $errors->first('password') }}">
    <x-slot:label>password</x-slot:label>
    <x-forms.inputs.text
        id="fieldPassword"
        type="password"
        name="password"
        placeholder="********"
        required
        value="{{ old('password') }}"
        error="{{ $errors->first('password') }}"
    />
</x-forms.groups.group>
@if ($withConfirmation)
<!-- Confirm Password -->
<x-forms.groups.group for="fieldPassword_confirmation" error="{{ $errors->first('password_confirmation') }}">
    <x-slot:label>password</x-slot:label>
    <x-forms.inputs.text
        id="fieldPassword_confirmation"
        type="password"
        name="password_confirmation"
        placeholder="********"
        required
        value="{{ old('password_confirmation') }}"
        error="{{ $errors->first('password_confirmation') }}"
    />
</x-forms.groups.group>
@endif
