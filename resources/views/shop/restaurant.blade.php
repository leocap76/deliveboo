<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.css" integrity="sha512-9iWaz7iMchMkQOKA8K4Qpz6bpQRbhedFJB+MSdmJ5Nf4qIN1+5wOVnzg5BQs/mYH3sKtzY+DOgxiwMz8ZtMCsw==" crossorigin="anonymous" />
    {{-- /fontawesome --}}

    {{-- favicon --}}
    <link rel="shortcut icon" type="image/x-icon" href="http://127.0.0.1:8000/img/favicon.png">

    {{-- style --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <script>var restaurant_id_js = {{ $infoRestaurant->id }};</script>
    
    <title>Deliveboo - {{ $infoRestaurant->name }}</title>
  </head>
  <body class="restaurant_page">
    {{-- header --}}
    @include('partials.header')
    {{-- !header --}}

    <main id="app">

      {{-- Box al click sul piatto --}}
      <div class="shop_box_container" id="box">

        <div class="shop_restaurant_box">

          <div class="top">
            <h2>@{{ plate.name }}</h2>
          </div>

          <div class="bottom">

            <img :src="(plate.img.includes('images/')) ? 'storage/' + plate.img : plate.img" :alt="plate.name">
  
            <h3>Ingredienti: </h3>
            <p>@{{ plate.ingredients }}</p>
    
            <h3>Descrizione: </h3>
            <p>@{{ plate.description }}</p>

            <h3>Prezzo: </h3>
            <p>@{{ plate.price }}€</p>
            <button class="button_shop" @click="push_plate(plate.name, plate.price)">Aggiungi alla cassa <i class="fas fa-cart-plus"></i></button>
            <button class="button_shop" @click="close_box()">Chiudi</button>
          </div>

        </div>

      </div>
      {{-- /Box al click sul piatto --}}

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
              @if ($plate->available == 1)
                <div class="shop_card_plates" >
                  <div class="shop_card_plates_left">
                    <h3 class="ellipsis">{{ $plate->name }}</h3>
                    <p class="ellipsis"> {{ $plate->ingredients }}</p>
                    <h5> {{  number_format($plate->price,2,",",".") }}€ <i class="fas fa-plus-circle" @click="push_plate('{{ $plate->name }}', {{ $plate->price }})"></i></h5>
                    <i class="fas fa-info-circle" @click="open_box('{{ $plate->name }}', {{ $plate->price }}, '{{ $plate->description }}', '{{ $plate->ingredients }}', '{{ $plate->img_path }}' )"></i>
                  </div>
                  <div class="shop_card_plates_right">
                    <img src="{{ ( str_contains($plate->img_path, 'images/') ) ? asset('storage/' . $plate->img_path) : $plate->img_path }}" alt="{{ $plate->name }}">
                  </div>
                </div>
              @else
                <div class="disable shop_card_plates">
                  <div class="shop_card_plates_left">
                    <h3 class="ellipsis">{{ $plate->name }}</h3>
                    <p class="ellipsis"> {{ $plate->ingredients }}</p>
                    <h5> {{  number_format($plate->price,2,",",".") }}€ </h5>

                  </div>
                  <div class="shop_card_plates_right">
                    <img src="{{ ( str_contains($plate->img_path, 'images/') ) ? asset('storage/' . $plate->img_path) : $plate->img_path }}" alt="{{ $plate->name }}">
                  </div>
                </div>
              @endif
            @endforeach
          </div>
          {{-- carrello --}}
          <div class="shop_cart"  v-if="cart_plates.length > 0" >

            <div id="shop_cart_top">
              <a href="{{ route('shop.payment.index') }}" class="shop_cart_button" @click="save">Vai alla cassa</a>
              <ul>
                <li v-for="(item,index) in cart_plates" class="clearfix">

                  <div class="cart_left_div">
                    <i class="fas fa-minus-circle" @click="plate_minus(index)"></i> <span>@{{ item.amount }}</span> <i class="fas fa-plus-circle" @click="plate_plus(index)"></i>
                  </div>

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

    <script src="{{ asset('js/cartRestaurantPage.js') }}"></script>
  </body>

</html>