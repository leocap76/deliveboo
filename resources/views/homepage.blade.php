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
        <!-- !header -->

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
                    <h2>Clicca su una categoria per vederne i ristoranti di deliveboo</h2>

                    <div class="cards">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @foreach ($categories as $category)
                                    <div class="swiper-slide" style="background-image: url('{{ asset('img/' . $category->img_path) }}'); border: 5px solid {{ $category->color }}" @click="getRestaurants({{ $category->id }}, '{{ $category->name}}', '{{ $category->color}}')"> <span>{{ $category->name }}</span> </div>
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

            <section :class="restaurantIsVisible ? 'visible_restaurants' : ''" id="restaurants_homepage" :style="'background-color: ' + categoryColor">
                <div class="container">

                    <i class="fas fa-times section-closer" @click="switchSection()"></i>
                    <h2>I tuoi ristoranti preferiti, direttamente a casa tua</h2>
                    <h4>Abbiamo trovato @{{ restaurants.length }} @{{ restaurants.length != 1 ? 'ristoranti' : 'ristorante' }} nella categoria: @{{ category }}</h4>

                    <div class="restaurants_homepage_container">
                        <a v-for="restaurant in restaurants" class="restaurants_homepage_card" :href="'{{ url('restaurant') }}' + '/' + restaurant.info_restaurant.slug">
                            <div class="top_restaurants_homepage_card">
                                <img :src="(restaurant.info_restaurant.img_path.includes('images/')) ? 'storage/' + restaurant.info_restaurant.img_path : restaurant.info_restaurant.img_path" :alt="restaurant.info_restaurant.name">
                            </div>

                            <div class="middle_restaurants_homepage_card">
                                <h4>@{{ restaurant.info_restaurant.name }}</h4>
                                <p>@{{ restaurant.info_restaurant.description }}</p>
                                
                            </div>

                            <div class="bottom_restaurants_homepage_card">
                                <span v-for="restaurant_category in restaurant.categories" class="badge" :style="'background-color: ' + restaurant_category.color">@{{ restaurant_category.name }}</span>
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