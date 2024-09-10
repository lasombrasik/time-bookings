<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? __('messages.my_app') }}</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="flex flex-col min-h-screen">
    @include('layouts.header')

    <main class="flex-grow">
        {{ $slot }}
    </main>

    <footer class="bg-gray-200 py-4">
        <div class="container mx-auto text-center">
            <p>{{ __('messages.copyright') }}</p>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
