<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- slider cdn --}}
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        {{-- /slider cdn --}}

        {{-- style --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        
        <title>Deliveboo</title> 
    </head>

    
    <body>

        {{-- loading screen --}}
        <section id="loading_screen">
            <p>Caricamento in corso</p>
        </section>
        {{-- /loading screen --}}

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
                        <input type="text" placeholder="Inserisci categoria" class="input_search">
                        <button class="button_search">Cerca</button>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                </div>
            </section>

            <section id="categories">
                <h2>Categorie</h2>
                <div class="cards container-fluid">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">Slide 1</div>
                            <div class="swiper-slide">Slide 2</div>
                            <div class="swiper-slide">Slide 3</div>
                            <div class="swiper-slide">Slide 4</div>
                            <div class="swiper-slide">Slide 5</div>
                            <div class="swiper-slide">Slide 6</div>
                            <div class="swiper-slide">Slide 7</div>
                            <div class="swiper-slide">Slide 8</div>
                            <div class="swiper-slide">Slide 9</div>
                            <div class="swiper-slide">Slide 10</div>
                        </div>
                        <!-- arrow -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </section>

            {{-- section categoria restaurants --}}

            <section id="restaurants_homepage">
                <div class="container">
                    <div class="restaurants_homepage_card">
                        
                    </div>
                    <div class="restaurants_homepage_card">
                        
                    </div>
                    <div class="restaurants_homepage_card">
                        
                    </div>
                    <div class="restaurants_homepage_card">
                        
                    </div>
                    <div class="restaurants_homepage_card">
                        
                    </div>
                    <div class="restaurants_homepage_card">
                        
                    </div>
                    <div class="restaurants_homepage_card">
                        
                    </div>
                </div>
            </section>

            {{-- !section categoria restaurants --}}
            
            
                
                
            
        </main>

        <footer>

        </footer>
        
        {{-- slider cdn --}}
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script src="{{ asset('js/slider.js') }}"></script>
        {{-- /slider cdn --}}
        <script src="{{ asset('js/loading.js') }}"></script>

    </body>
</html>