<x-layouts.app
    page-title="Авторизация"
>
<!-- Session Status -->

@if (session('status'))
<x-panels.messages.success class="mb-4" :messages="(array) session('status')" />
@endif
<x-panels.messages.form_validation_errors />

<x-forms.form action="{{ route('login') }}" method="POST" class="">
    @csrf

    <!-- Email Address -->
    <x-forms.concrete-forms-fields.auth.email />
    
    <!-- Password -->
    <x-forms.concrete-forms-fields.auth.password />
    
    <x-forms.submit-button>Войти</x-forms.submit-button>

</x-forms.form>

</x-layouts.app>