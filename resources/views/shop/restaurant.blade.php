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

    <main id="app">

      <section id="shop_restaurant_top">
        <div class="container">
          <div class="left">
            <h2>{{ $infoRestaurant->name }}</h2>

            <p>
              @foreach ($categories as $category)
                  <span>{{ $category->name }} -</span>
              @endforeach
              <span>Aperti fino alle: {{ substr($infoRestaurant->closing_time, -8, 5) }}</span>
            </p>
            <p class="shop_restaurant_address">{{ $infoRestaurant->address }}</p>
            <p> {{ $infoRestaurant->description }}</p>
          </div>
          <div class="right">
            <img src="{{ ( str_contains($infoRestaurant->img_path, 'images/') ) ? asset('storage/' . $infoRestaurant->img_path) : $infoRestaurant->img_path }}" alt="{{ $infoRestaurant->name }}">
          </div>
        </div>
      </section>

      <section id="shop_restaurant_bottom">

        <div class="container">
          <div class="plates_container">
            @foreach ($plates as $plate)
              <div class="shop_card_plates" @click="push_plate('{{ $plate->name }}', {{ $plate->price }})" >
                <img src="{{ ( str_contains($plate->img_path, 'images/') ) ? asset('storage/' . $plate->img_path) : $plate->img_path }}" alt="{{ $plate->name }}">
                <h3 class="ellipsis">{{ $plate->name }}</h3>
                <p class="ellipsis"> {{ $plate->ingredients }}</p>
                <h5> {{  number_format($plate->price,2,",",".") }}€</h5>
                {{-- <p> {{ $plate->description }}</p> --}}
              </div> 
            @endforeach
          </div>
          {{-- carrello --}}
          <div class="shop_cart"  v-if="cart_plates.length > 0" >

            <div id="shop_cart_top">
              <a href="#" class="shop_cart_button">Vai alla cassa</a>
              <ul>
                <li v-for="(item,index) in cart_plates" class="clearfix">

                  <div class="cart_left_div">
                    <i class="fas fa-minus-circle" @click="plate_minus(index)"></i> <span>@{{ item.amount }}</span> <i class="fas fa-plus-circle" @click="plate_plus(index)"></i>
                  </div>

                  {{-- <i class="fas fa-trash" @click="plate_remove(index)"></i> --}}

                  <div class="cart_middle_div">
                    @{{ item.name }}
                  </div>

                  <div class="cart_right_div">
                    @{{ item.price.toLocaleString("it-IT", {'minimumFractionDigits':2,'maximumFractionDigits':2}) }}€
                  </div>
                  
                </li>
              </ul>
            </div>

            <div id="shop_cart_bottom">
              <div id="shop_cart_bottom_delivery">
                <div>Spese di consegna</div>
                <div>@{{ delivery.toLocaleString("it-IT", {'minimumFractionDigits':2,'maximumFractionDigits':2}) }}€</div>
              </div>

              <div id="shop_cart_bottom_total">
                <div>Totale</div>
                <div id="item_plate" class="price_animation">@{{ tot_price.toLocaleString("it-IT", {'minimumFractionDigits':2,'maximumFractionDigits':2}) }}€</div>
              </div>
            </div>
            
          </div>

          <div class="shop_cart" v-else>
            <div class="shop_cart_empty_button"><a href="#" class="shop_cart_button">Vai alla cassa</a></div>
            <div class="shop_cart_empty_content">Il tuo carrello è vuoto</div>
          </div>
        </div>

        
        {{-- carrello --}}
      </section>
        
    </main>

    {{-- footer --}}
    @include('partials.footer')
    {{-- !footer --}}

    {{-- Box al click sul piatto --}}
    <div class="shop_box_container">
      <div class="shop_restaurant_box">
        <h2>{{ $plate->name }}</h2>
        <p>{{ $plate->ingredients }}</p>
        <p>{{ $plate->description }}</p>
        <img src="{{ ( str_contains($plate->img_path, 'images/') ) ? asset('storage/' . $plate->img_path) : $plate->img_path }}" alt="{{ $plate->name }}">
        <button class="button_shop">Aggiungi alla cassa <i class="fas fa-cart-plus"></i></button>
      </div>
    </div>
      
    {{-- /Box al click sul piatto --}}

    <script src="{{ asset('js/cartRestaurantPage.js') }}"></script>
  </body>

</html>