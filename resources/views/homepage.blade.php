<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- style --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        
        <title>Deliveboo</title> 
    </head>

    
    <body>
        <!-- header -->
        <header>
            <div class="container-fluid header_container">
                <div class="header_left">
                    <img src="{{ asset('img/deliverboomarchio.jpg') }}" alt="deliveboo" class="logo_img">

                </div>
                
                <div class="header_right">
                    @if (Route::has('login'))
                        <div class="top-right links">
                        @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                        @endauth
                    </div>
                    @endif
                </div>
             </div>
        </header>
    
    </body>
</html>