<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

     {{-- fontawesome --}}
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.css" integrity="sha512-9iWaz7iMchMkQOKA8K4Qpz6bpQRbhedFJB+MSdmJ5Nf4qIN1+5wOVnzg5BQs/mYH3sKtzY+DOgxiwMz8ZtMCsw==" crossorigin="anonymous" />
     {{-- /fontawesome --}}

     {{-- favicon --}}
     <link rel="shortcut icon" type="image/x-icon"href="img/favicon.png">

    {{-- style --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>Deliveboo - Login|Register</title>

</head>
<body class="login_register">
    {{-- loading screen --}}
    <section id="loading_screen">
        <img src="img/deliverbooML.jpg" alt="Deliveboo">
    </section>
    {{-- /loading screen --}}

    <!-- header -->
    @include('partials.header')
    <!-- !header -->


    {{-- box name & password --}}
    <main>
        @yield('content')
    </main>
    {{-- !box name & password --}}

    {{-- footer --}}
    @include('partials.footer')
    {{-- !footer --}}

    <script src="{{ asset('js/app.js') }}"></script>
    {{-- slider cdn --}}
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    {{-- /slider cdn --}}

    <script src="{{ asset('js/loading.js') }}"></script>
</body>
</html>
