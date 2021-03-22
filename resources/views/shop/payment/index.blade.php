<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="shortcut icon" type="image/x-icon" href="http://127.0.0.1:8000/img/favicon.png">

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

                @if (session('success_message'))
                    <div class="alert alert-success">
                        {{ session('success_message') }}
                    </div>
                @endif

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="left">
                    <h1>Pagamento</h1>
                    {{-- <form action="{{ route('shop.payment.checkout') }}" method="post">
                        @csrf
                        @method('POST')
                        <label for="name">Nome: </label>
                        <input type="text" placeholder="Inserisci il tuo nome" id="name">

                        <label for="lastname">Cognome: </label>
                        <input type="text" placeholder="Inserisci il tuo cognome" id="lastname">

                        <label for="address">Indirizzo: </label>
                        <input type="text" placeholder="Inserisci il tuo indirizzo" id="address">

                        <label for="mail">Email: </label>
                        <input type="text" placeholder="Inserisci la tua email" id="mail">

                        <label for="number">Numero di telefono: </label>
                        <input type="text" placeholder="Inserisci il tuo numero telefonico" id="number"> --}}

                        {{-- <input type="text" placeholder="prezzo"> --}}
                        {{-- 
                        <div>

                            <input type="submit" value="Aquista" class="btn">
                            

                            <a href="{{ url()->previous() }}" class="btn">Torna indietro</a>
                        </div>

                    </form> --}}

                    {{-- FORM GIA CREATO --}}

                    <div class="content">
                        <form id="payment-form" action="{{ route('shop.payment.checkout') }}" method="post">
                            @csrf
                            @method('POST')
                            <section>
                                <label for="amount">
                                    <span class="input-label">Amount</span>
                                    <div class="input-wrapper amount-wrapper">
                                        <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="10">
                                    </div>
                                </label>
        
                                <div class="bt-drop-in-wrapper">
                                    <div id="bt-dropin"></div>
                                </div>
                            </section>
        
                            <input id="nonce" name="payment_method_nonce" type="hidden" />
                            <button class="button" type="submit"><span>Test Transaction</span></button>
                        </form>
                    </div>
                    


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

            {{-- SCRIPT BRAINTREE --}}

            <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
            <script>
                var form = document.querySelector('#payment-form');
                var client_token = "{{ $token }}";
                braintree.dropin.create({
                authorization: client_token,
                selector: '#bt-dropin',
                paypal: {
                    flow: 'vault'
                }
                }, function (createErr, instance) {
                if (createErr) {
                    console.log('Create Error', createErr);
                    return;
                }
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    instance.requestPaymentMethod(function (err, payload) {
                    if (err) {
                        console.log('Request Payment Method Error', err);
                        return;
                    }
                    // Add the nonce to the form and submit
                    document.querySelector('#nonce').value = payload.nonce;
                    form.submit();
                    });
                });
                });
            </script>
    </body>
</html>