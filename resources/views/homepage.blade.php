<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- slider cdn --}}
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        {{-- /slider cdn --}}
        
        {{-- fontawesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.css" integrity="sha512-9iWaz7iMchMkQOKA8K4Qpz6bpQRbhedFJB+MSdmJ5Nf4qIN1+5wOVnzg5BQs/mYH3sKtzY+DOgxiwMz8ZtMCsw==" crossorigin="anonymous" />
        {{-- /fontawesome --}}

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

            <!--  footer -->
        <footer>
            <div class="container homepage_footer">
                {{-- footer top --}}
                <div class="footer_top">
                    <div class="items">
                        <h4>ABOUT US</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas hic asperiores iusto blanditiis beatae magni illum? Aperiam placeat,</p>
                    </div>
                    <div class="items">
                        <h4>TEAM</h4>
                        <ul>
                            <li><a href="https://github.com/stefanof707" target="_blank">Stefano Franchini</a></li>
                            <li><a href="https://github.com/alessio-source" target="_blank">Alessio Pancia</a></li>
                            <li><a href="https://github.com/alexsircu" target="_blank">Alex Sircu</a></li>
                            <li><a href="https://github.com/mariotota" target="_blank">Mario Tota</a></li>
                            <li><a href="https://github.com/leocap76" target="_blank">Leonardo Capogna</a></li>
                        </ul>
                    </div>
                    <div class="items">
                        <h4>CONTACTS</h4>
                        <ul>
                            <li>tel: +39 3663140799</li>
                            <li>deliveboo.info@email.com</li>

                        </ul>
                        
                    </div>
                </div>
                {{-- /footer top --}}
                
                {{-- footer bottom --}}
                <div class="footer_bottom">
                    <div class="footer_bottom_left">
                        <p>
                          &copy;Deliveboo {{ date('Y') }} 
                        </p>
                    </div>

                    <div class="footer_bottom_right">
                        <ul>
                            <li><a href="https://www.facebook.com/boolean.careers/" target="_blank"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="https://twitter.com/booleancareers" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="https://youtu.be/59zORE5buOo" target="_blank"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.linkedin.com/school/boolean-careers/mycompany/" target="_blank"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.instagram.com/boolean.careers/" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                          </ul>
                    </div>
                </div>
                {{-- /footer bottom --}}
            </div>
        </footer> 

        {{-- slider cdn --}}
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script src="{{ asset('js/slider.js') }}"></script>
        {{-- /slider cdn --}}
        <script src="{{ asset('js/loading.js') }}"></script>

    </body>
</html>