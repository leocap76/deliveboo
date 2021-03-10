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
            <div class="container header_container">
                <div class="header_left">
                    <a href="#">
                      <img src="{{ asset('img/deliverboomarchio.jpg') }}" alt="deliveboo" class="logo_img">
                    </a>        
                </div>
                
                <div class="header_right">
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <a href="{{ url('/home') }}" class="header_buttons">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="header_buttons">Accedi</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="header_buttons">Registrati</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
             </div>
        </header>

        <main>
            <section id="jumbotron">
                <div class="container">
                    <div class="search_container">
                        <h4>Inserisci il tuo indirizzo per trovare ristoranti nei dintorni</h4>
                        <input type="text" placeholder="Inserisci categoria" class="search_input">
                        <button>Cerca</button>
                    </div>
                </div>
            </section>

            <section>
                
            </section>

            
            
            
                
                
            
        </main>

        <footer>

        </footer>
    
    </body>
</html>