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
  <body>
    {{-- header --}}
    @include('partials.header')
    {{-- !header --}}

    <main>
      <section class="container" id="shop_restaurant">
        <div class="shop_restaurant_top">
          <h1>{{ $infoRestaurant->name }}</h1>
          <small>Indirizzo: {{ $infoRestaurant->address }}</small>
          <p>Descrizione: {{ $infoRestaurant->description }}</p>
          <img src="{{ ( str_contains($infoRestaurant->img_path, 'images/') ) ? asset('storage/' . $infoRestaurant->img_path) : $infoRestaurant->img_path }}" alt="{{ $infoRestaurant->name }}" style="width: 200px;">
        </div>

        <hr>

        <div class="shop_restaurant_bottom">
          @foreach ($plates as $plate)
            <div>
              <img src="{{ asset( 'storage/' . $plate->img_path) }}" alt="">
              <h3>{{ $plate->name }}</h3>
              <p>Descrizione: {{ $plate->description }}</p>
              <p>Ingredienti: {{ $plate->ingredients }}</p>
              <h4>Prezzo: {{ $plate->price }}€</h4>
            </div>
          @endforeach
        </div>
        
      </section>
    </main>

    {{-- footer --}}
    @include('partials.footer')
    {{-- !footer --}}
  </body>
</html>