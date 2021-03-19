<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.css" integrity="sha512-9iWaz7iMchMkQOKA8K4Qpz6bpQRbhedFJB+MSdmJ5Nf4qIN1+5wOVnzg5BQs/mYH3sKtzY+DOgxiwMz8ZtMCsw==" crossorigin="anonymous" />
    {{-- /fontawesome --}}

    {{-- style --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <title>Deliveboo - {{ $infoRestaurant->name }}</title> 
  </head>
  <body class="restaurant_page">
    {{-- header --}}
    @include('partials.header')
    {{-- !header --}}

    <main>
      <section class="container" id="shop_restaurant">
        <div class="shop_restaurant_top">
          <div class="left">
            <h1>{{ $infoRestaurant->name }}</h1>
            <small>indirizzo: {{ $infoRestaurant->address }}</small>
            <h4>Descrizione:</h4>
            <p> {{ $infoRestaurant->description }}</p>
          </div>
          <div class="right">
            <img src="{{ ( str_contains($infoRestaurant->img_path, 'images/') ) ? asset('storage/' . $infoRestaurant->img_path) : $infoRestaurant->img_path }}" alt="{{ $infoRestaurant->name }}">
          </div>
        </div>

        <div class="shop_restaurant_bottom">
          <div class="plates_container">
            @foreach ($plates as $plate)
              <div class="shop_card_plates">
                <img src="{{ asset( 'storage/' . $plate->img_path) }}" alt="{{ $plate->name }}">
                <h3>{{ $plate->name }}</h3>
                <p> {{ $plate->ingredients }}</p>
                <h5> {{ $plate->price }}€</h5>
                {{-- <p> {{ $plate->description }}</p> --}}
              </div> 
              <div class="shop_card_plates">
                <img src="{{ asset( 'storage/' . $plate->img_path) }}" alt="{{ $plate->name }}">
                <h3>{{ $plate->name }}</h3>
                <p> {{ $plate->ingredients }}</p>
                <h5> {{ $plate->price }}€</h5>
                {{-- <p> {{ $plate->description }}</p> --}}
              </div> 
              <div class="shop_card_plates">
                <img src="{{ asset( 'storage/' . $plate->img_path) }}" alt="{{ $plate->name }}">
                <h3>{{ $plate->name }}</h3>
                <p> {{ $plate->ingredients }}</p>
                <h5> {{ $plate->price }}€</h5>
                {{-- <p> {{ $plate->description }}</p> --}}
              </div> 
              <div class="shop_card_plates">
                <img src="{{ asset( 'storage/' . $plate->img_path) }}" alt="{{ $plate->name }}">
                <h3>{{ $plate->name }}</h3>
                <p> {{ $plate->ingredients }}</p>
                <h5> {{ $plate->price }}€</h5>
                {{-- <p> {{ $plate->description }}</p> --}}
              </div>
              <div class="shop_card_plates">
                <img src="{{ asset( 'storage/' . $plate->img_path) }}" alt="{{ $plate->name }}">
                <h3>{{ $plate->name }}</h3>
                <p> {{ $plate->ingredients }}</p>
                <h5> {{ $plate->price }}€</h5>
                {{-- <p> {{ $plate->description }}</p> --}}
              </div> 
              <div class="shop_card_plates">
                <img src="{{ asset( 'storage/' . $plate->img_path) }}" alt="{{ $plate->name }}">
                <h3>{{ $plate->name }}</h3>
                <p> {{ $plate->ingredients }}</p>
                <h5> {{ $plate->price }}€</h5>
                {{-- <p> {{ $plate->description }}</p> --}}
              </div> 
              <div class="shop_card_plates">
                <img src="{{ asset( 'storage/' . $plate->img_path) }}" alt="{{ $plate->name }}">
                <h3>{{ $plate->name }}</h3>
                <p> {{ $plate->ingredients }}</p>
                <h5> {{ $plate->price }}€</h5>
                {{-- <p> {{ $plate->description }}</p> --}}
              </div> 
              <div class="shop_card_plates">
                <img src="{{ asset( 'storage/' . $plate->img_path) }}" alt="{{ $plate->name }}">
                <h3>{{ $plate->name }}</h3>
                <p> {{ $plate->ingredients }}</p>
                <h5> {{ $plate->price }}€</h5>
                {{-- <p> {{ $plate->description }}</p> --}}
              </div>
              <div class="shop_card_plates">
                <img src="{{ asset( 'storage/' . $plate->img_path) }}" alt="{{ $plate->name }}">
                <h3>{{ $plate->name }}</h3>
                <p> {{ $plate->ingredients }}</p>
                <h5> {{ $plate->price }}€</h5>
                {{-- <p> {{ $plate->description }}</p> --}}
              </div> 
              <div class="shop_card_plates">
                <img src="{{ asset( 'storage/' . $plate->img_path) }}" alt="{{ $plate->name }}">
                <h3>{{ $plate->name }}</h3>
                <p> {{ $plate->ingredients }}</p>
                <h5> {{ $plate->price }}€</h5>
                {{-- <p> {{ $plate->description }}</p> --}}
              </div> 
              <div class="shop_card_plates">
                <img src="{{ asset( 'storage/' . $plate->img_path) }}" alt="{{ $plate->name }}">
                <h3>{{ $plate->name }}</h3>
                <p> {{ $plate->ingredients }}</p>
                <h5> {{ $plate->price }}€</h5>
                {{-- <p> {{ $plate->description }}</p> --}}
              </div> 
              <div class="shop_card_plates">
                <img src="{{ asset( 'storage/' . $plate->img_path) }}" alt="{{ $plate->name }}">
                <h3>{{ $plate->name }}</h3>
                <p> {{ $plate->ingredients }}</p>
                <h5> {{ $plate->price }}€</h5>
                {{-- <p> {{ $plate->description }}</p> --}}
              </div>
              <div class="shop_card_plates">
                <img src="{{ asset( 'storage/' . $plate->img_path) }}" alt="{{ $plate->name }}">
                <h3>{{ $plate->name }}</h3>
                <p> {{ $plate->ingredients }}</p>
                <h5> {{ $plate->price }}€</h5>
                {{-- <p> {{ $plate->description }}</p> --}}
              </div> 
              <div class="shop_card_plates">
                <img src="{{ asset( 'storage/' . $plate->img_path) }}" alt="{{ $plate->name }}">
                <h3>{{ $plate->name }}</h3>
                <p> {{ $plate->ingredients }}</p>
                <h5> {{ $plate->price }}€</h5>
                {{-- <p> {{ $plate->description }}</p> --}}
              </div> 
              <div class="shop_card_plates">
                <img src="{{ asset( 'storage/' . $plate->img_path) }}" alt="{{ $plate->name }}">
                <h3>{{ $plate->name }}</h3>
                <p> {{ $plate->ingredients }}</p>
                <h5> {{ $plate->price }}€</h5>
                {{-- <p> {{ $plate->description }}</p> --}}
              </div> 
              <div class="shop_card_plates">
                <img src="{{ asset( 'storage/' . $plate->img_path) }}" alt="{{ $plate->name }}">
                <h3>{{ $plate->name }}</h3>
                <p> {{ $plate->ingredients }}</p>
                <h5> {{ $plate->price }}€</h5>
                {{-- <p> {{ $plate->description }}</p> --}}
              </div> 
            @endforeach
          </div>
        {{-- carrello --}}
          <div class="shop_cart">
            <h3>Il tuo carrello</h3>
            <h4>Prezzo totale:</h4>
          </div>
          {{-- carrello --}}
        </div>
        
      </section>
    </main>

    {{-- footer --}}
    @include('partials.footer')
    {{-- !footer --}}
  </body>
</html>