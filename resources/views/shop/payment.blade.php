<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        {{-- fontawesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.css" integrity="sha512-9iWaz7iMchMkQOKA8K4Qpz6bpQRbhedFJB+MSdmJ5Nf4qIN1+5wOVnzg5BQs/mYH3sKtzY+DOgxiwMz8ZtMCsw==" crossorigin="anonymous" />
        {{-- /fontawesome --}}

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <title>Shop - Cart</title>
    </head>
    <body class="payment">
        
        @include('partials.header')
        
        <main id="app">
            <div class="container">

                <div class="left">
                    <h1>Pagamento</h1>
                    <form action="">
                        <label for="name">Nome: </label>
                        <input type="text" placeholder="Inserisci il tuo nome" id="name">

                        <label for="lastname">Cognome: </label>
                        <input type="text" placeholder="Inserisci il tuo cognome" id="lastname">

                        <label for="address">Indirizzo: </label>
                        <input type="text" placeholder="Inserisci il tuo indirizzo" id="address">

                        <label for="mail">Email: </label>
                        <input type="text" placeholder="Inserisci la tua email" id="mail">

                        <label for="number">Numero di telefono: </label>
                        <input type="text" placeholder="Inserisci il tuo numero telefonico" id="number">

                        {{-- <input type="text" placeholder="prezzo"> --}}

                        <div>
                            <input type="submit" value="Aquista" class="btn">
                            <a href="{{ url()->previous() }}" class="btn">Torna indietro</a>
                        </div>

                    </form>
                </div>

                <div class="right">
                    <div class="shop_cart" >

                        <div id="shop_cart_top">
                            <p class="title_top">Piatti acquistati: </p>
                            <div v-for="(item, index) in arrItems">
                                <p>@{{ index + 1 }}) @{{ item.name }} x@{{ item.amount }} prezzo: @{{ item.price }}€</p>
                            </div>
                        </div>
    
                        <div id="shop_cart_bottom">
                        <div id="shop_cart_bottom_delivery">
                            <div>Spese di consegna</div>
                            <div>@{{ delivery }}€</div>
                        </div>
            
                        <div id="shop_cart_bottom_total">
                            <div>Totale</div>
                            <div id="item_plate" class="price_animation">@{{ tot_price }}€</div>
                        </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </main>
            
            @include('partials.footer')

            <script src="{{ asset('js/paymentPage.js') }}"></script>
    </body>
</html>