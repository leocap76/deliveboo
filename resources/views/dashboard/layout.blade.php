<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        {{-- fontawesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.css" integrity="sha512-9iWaz7iMchMkQOKA8K4Qpz6bpQRbhedFJB+MSdmJ5Nf4qIN1+5wOVnzg5BQs/mYH3sKtzY+DOgxiwMz8ZtMCsw==" crossorigin="anonymous" />
        {{-- /fontawesome --}}

        {{-- favicon --}}
        <link rel="shortcut icon" type="image/x-icon" href="http://127.0.0.1:8000/img/favicon.png">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        @yield('librery')

        <title>@yield('title')</title>

    </head>
    <body class="dashboard @yield('page')">

        @include('partials.header')

        <main>

            @include('partials.sidebar')

            @yield('main')

        </main>

    {{-- footer --}}
    {{-- @include('partials.footer') --}}
    {{-- !footer --}}

    @yield('script')

    </body>
</html>