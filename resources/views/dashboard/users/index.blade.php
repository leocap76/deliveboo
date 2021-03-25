<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        {{-- fontawesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.css" integrity="sha512-9iWaz7iMchMkQOKA8K4Qpz6bpQRbhedFJB+MSdmJ5Nf4qIN1+5wOVnzg5BQs/mYH3sKtzY+DOgxiwMz8ZtMCsw==" crossorigin="anonymous" />
        {{-- /fontawesome --}}

        {{-- favicon --}}
        <link rel="shortcut icon" type="image/x-icon" href="http://127.0.0.1:8000/img/favicon.png">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        {{-- cdn chart --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js" integrity="sha512-hZf9Qhp3rlDJBvAKvmiG+goaaKRZA6LKUO35oK6EsM0/kjPK32Yw7URqrq3Q+Nvbbt8Usss+IekL7CRn83dYmw==" crossorigin="anonymous"></script>

        <title>Benvenuto - {{ $user->name }}</title>

    </head>
    <body class="dashboard">

        @include('partials.header')

        @include('partials.sidebar')

        <main>
  
            <div id="dashboard_index_center">
              {{-- prima card --}}
              <div class="dashboard_card info_restaurant">
                <h2>{{ $user->infoRestaurant->name }}</h2>
                <h3><i class="fas fa-map-marked-alt"></i> {{ $user->infoRestaurant->address }}</h3>
                <h5><i class="fas fa-info-circle"></i> {{ $user->infoRestaurant->description }}</h5>
                <p>Orario apertura: {{ $user->infoRestaurant->opening_time }}</p>
                <p>Orario Chiusura: {{ $user->infoRestaurant->closing_time }}</p>
                <p>Partita IVA: {{ $user->infoRestaurant->PIVA }}</p>
              </div>
              {{-- !prima card --}}

              {{-- seconda card --}}
              <div class="dashboard_card img_restaurant">
                <img src="{{ ( str_contains($user->infoRestaurant->img_path, 'images/') ) ? asset('storage/' . $user->infoRestaurant->img_path) : $user->infoRestaurant->img_path }}" alt="{{ $user->infoRestaurant->name }}">
              </div>
              {{-- !seconda card --}}

              {{-- terza card --}}
              <div class="dashboard_card orders_list">
                <ul>

                  @foreach ($orders as $order)
                  <li>
                     <h3>{{ $order->name }}</h3>
                     <p><i class="fas fa-map-marked-alt"></i> {{ $order->address }}</p>
                     <p><i class="fas fa-comment-alt"></i> {{ $order->comment }}</p>
                     <p><i class="fas fa-envelope"></i> {{ $order->email }}</p>
                     <p><i class="fas fa-clock"></i> {{ $order->time }}</p>
                     @foreach (json_decode($order->arrPlates) as $plate)
                        <h4><i class="fas fa-utensils"></i> {{ $plate->name }} x{{ $plate->amount }} <i class="far fa-circle circle_price"></i> {{ $plate->price }}€</h4>
                     @endforeach

                     <h4>Prezzo totale: {{ $order->price }}€</h4>

                  </li> 
                  <hr>
                  @endforeach

                </ul>
              </div>
              {{-- !terza card --}}

             {{-- quarta card --}}
             <div id="chart" class="dashboard_card chart_restaurant">

              <canvas id="myChart"></canvas>
             </div>
             {{-- !quarta card --}}
            </div>
            

        </main>

    {{-- footer --}}
    @include('partials.footer')
    {{-- !footer --}}

    <script> 
      let userId = {{ $user->id }};
    </script>
        
    <script src="{{ asset('js/chart.js') }}"></script>


    </body>
</html>