<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <header>
        @include('layouts.default.header')
    </header>

    <main>
        <section id="app">
            @yield('content')
        </section>
    </main>

    <footer>
        @include('layouts.default.footer')
    </footer>

    @component('layouts.default.body_scripts')
        @yield('scripts')
    @endcomponent

</body>
</html>