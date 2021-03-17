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
            <img src="img/deliverbooML.jpg" alt="Deliveboo">
        </section>
        {{-- /loading screen --}}

        <!-- header -->

        @include('partials.header')

        <main id="app">
            <section id="jumbotron">
                <div class="container">
                    <h1>I piatti che ami, a domicilio.</h1>
                    <div class="search_container">
                        <p>Inserisci il nome del tuo ristorante preferito!</p>
                        <div class="search_input_container">
                            <input type="text" placeholder="Inserisci il nome del ristorante" class="input_search">
                            <button class="button_search">Cerca</button>
                        </div>
                        <p>#acasatuacondeliveboo</p>
                    </div>
                </div>
            </section>

            <section id="categories">
                <div class="container">
                    <h2>La selezione di Deliveboo</h2>

                    <div class="cards">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @foreach ($categories as $category)
                                    <div class="swiper-slide" style="background-image: url('{{ asset('img/' . $category->img_path) }}')" @click="getRestaurants({{ $category->id }})"> <span>{{ $category->name }}</span> </div>
                                @endforeach
                            </div>
                            <!-- arrow -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>

                </div>
            </section>

            {{-- section categoria restaurants --}}

            <section id="restaurants_homepage">
                <div class="container">
                    <h2>I tuoi ristoranti preferiti, direttamente a casa tua</h2>

                    <div class="restaurants_homepage_container">

                        <a class="restaurants_homepage_card" href="#">
                            <div class="top_restaurants_homepage_card">
                                <img src="https://dummyimage.com/600x200/000/fff" alt="restaurant">
                            </div>

                            <div class="middle_restaurants_homepage_card">
                                <h4>Nome ristorante</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, nisi provident ipsum hic inventore quaerat rem eos atque odio, aliquam nostrum maiores voluptatibus a reiciendis sit neque ea. Dolore, doloribus?</p>
                                
                            </div>

                            <div class="bottom_restaurants_homepage_card">
                                <span class="badge badge-primary">Italiano</span>
                                <span class="badge badge-primary">Pizza</span>
                                <span class="badge badge-primary">Buono</span>
                            </div>
                        </a>

                        <a class="restaurants_homepage_card" href="#">
                            <div class="top_restaurants_homepage_card">
                                <img src="https://dummyimage.com/600x200/000/fff" alt="restaurant">
                            </div>

                            <div class="middle_restaurants_homepage_card">
                                <h4>Nome ristorante</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, nisi provident ipsum hic inventore quaerat rem eos atque odio, aliquam nostrum maiores voluptatibus a reiciendis sit neque ea. Dolore, doloribus?</p>
                                
                            </div>

                            <div class="bottom_restaurants_homepage_card">
                                <span class="badge badge-primary">Italiano</span>
                                <span class="badge badge-primary">Pizza</span>
                                <span class="badge badge-primary">Buono</span>
                            </div>
                        </a>

                        <a class="restaurants_homepage_card" href="#">
                            <div class="top_restaurants_homepage_card">
                                <img src="https://dummyimage.com/600x200/000/fff" alt="restaurant">
                            </div>

                            <div class="middle_restaurants_homepage_card">
                                <h4>Nome ristorante</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, nisi provident ipsum hic inventore quaerat rem eos atque odio, aliquam nostrum maiores voluptatibus a reiciendis sit neque ea. Dolore, doloribus?</p>
                                
                            </div>

                            <div class="bottom_restaurants_homepage_card">
                                <span class="badge badge-primary">Italiano</span>
                                <span class="badge badge-primary">Pizza</span>
                                <span class="badge badge-primary">Buono</span>
                            </div>
                        </a>

                        <a class="restaurants_homepage_card" href="#">
                            <div class="top_restaurants_homepage_card">
                                <img src="https://dummyimage.com/600x200/000/fff" alt="restaurant">
                            </div>

                            <div class="middle_restaurants_homepage_card">
                                <h4>Nome ristorante</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, nisi provident ipsum hic inventore quaerat rem eos atque odio, aliquam nostrum maiores voluptatibus a reiciendis sit neque ea. Dolore, doloribus?</p>
                                
                            </div>

                            <div class="bottom_restaurants_homepage_card">
                                <span class="badge badge-primary">Italiano</span>
                                <span class="badge badge-primary">Pizza</span>
                                <span class="badge badge-primary">Buono</span>
                            </div>
                        </a>

                    </div>
                    
                </div>
            </section>

            {{-- !section categoria restaurants --}}
            
            {{-- section come usare deliveboo --}}
            <section id="tutorial_card_section">
                <div class="container">
                    <h2>Come funziona Deliveboo</h2>
                    <div class="tutorial_cards_container">
                        <div class="tutorial_card">
                            {{-- <h3>Ordina il tuo piatto preferito</h3> --}}
                            <img src="{{ asset('img/ordinaonline6000.png') }}" alt="">
                           
                        </div>
                        <div class="tutorial_card">
                            {{-- <h3>Monitora la consegna in tempo reale</h3> --}}
                            <img src="{{ asset('img/ciclista6000.png') }}" alt="">
                            
                        </div>
                        <div class="tutorial_card">
                            {{-- <h3>Buon appetito!</h3> --}}
                            <img src="{{ asset('img/buonappetito6000.png') }}" alt="">
                            
                        </div>
                    </div>
                </div>
            </section>
            {{-- /section come usare deliveboo --}}    
                
            
        </main>

            <!--  footer -->
        <footer>
            <div class="container">
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

        <script src="{{ asset('js/app.js') }}"></script>
        {{-- slider cdn --}}
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        {{-- /slider cdn --}}
        <script src="{{ asset('js/loading.js') }}"></script>

        

    </body>
</html>