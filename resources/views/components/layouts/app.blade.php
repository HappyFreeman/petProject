<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{ config('app.name') }} - {{ $pageTitle ?? 'Главная страница'}}</title>
</head>
<body>
<header id="header" class="sticky-top">
    <x-panels.user_menu />
</header>

<main>
    {{--<x-panels.messages.flashes />--}}
    {{ $slot }}
</main>

<footer>
    {{-- <x-panels.copyrights /> --}}
</footer>
</body>
</html>