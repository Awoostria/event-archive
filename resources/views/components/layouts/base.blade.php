<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="h-full"
>

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    {!! SEO::generate(config('app.env') === 'production') !!}

    <x-favicons />

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')
    @livewireStyles
    @livewireScriptConfig

    <!-- Sentry Meta -->
    {!! \Sentry\Laravel\Integration::sentryMeta() !!}

    <!-- CSRF Token -->
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >
</head>

<body @class(['min-h-screen h-full', 'dark' => $dark ?? true])>
    @yield('body')

    @livewire('notifications')

    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
