@extends('dashboard.layout')

@section('librery')
     {{-- cdn chart --}}
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js" integrity="sha512-hZf9Qhp3rlDJBvAKvmiG+goaaKRZA6LKUO35oK6EsM0/kjPK32Yw7URqrq3Q+Nvbbt8Usss+IekL7CRn83dYmw==" crossorigin="anonymous"></script>
@endsection

@section('title')
Ordini - {{ $user->name }}
@endsection

@section('page')
  user_orders
@endsection

@section('main')
  <section id="dashboard_orders">

    {{-- sezione sinistra della pagina --}}
    <div class="dashboard_orders_left">
      <h2 class="text-center">Lista ordini</h2>

      <ul class="card_container">
        @foreach ($orders as $order)
          <li class="orders_card">

            <div class="orders_card_left">
              <p>Numero ordine: {{ $order->id }}</p>
            
              <p>Nome acquirente: {{ $order->name }}</p>

              <p>Indirizzo: {{ $order->address }}</p>

              <p>Email: {{ $order->email }}</p>

              <p>Prezzo totale: {{ number_format($order->price, 2, ",", ".") }}€</p>
            </div>
           
            <div class="orders_card_right">
              <ul>
                @foreach (json_decode($order->arrPlates) as $plate)
                  <li class="my-0">
                    @if (!empty($plate->img_path))
                    <img src="{{ $plate->img_path }}" alt="">
                    @endif
                    <p>{{ $plate->name }} <strong>{{ $plate->amount }} pz.</strong></p>
                  </li>
                @endforeach
              </ul>
            </div>

          </li>
        @endforeach  
      </ul>
      
    </div>
    {{-- sezione sinistra della pagina --}}

    {{-- sezione destra della pagina --}}
    <div id="chart" class="dashboard_orders_right">

      <div class="dashboard_orders_right_top">
        <canvas id="ordersChart"></canvas>
      </div>

      <div class="dashboard_orders_right_bottom">
        <canvas id="myChart"></canvas>
      </div>
      
    </div>
    {{-- sezione destra della pagina --}}
  </section>
@endsection

@section('script')
    <script> 
        let userId = {{ $user->id }};
    </script>
      
    <script src="{{ asset('js/chart.js') }}"></script>
@endsection