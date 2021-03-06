@extends('dashboard.layout')

@section('librery')
     {{-- cdn chart --}}
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js" integrity="sha512-hZf9Qhp3rlDJBvAKvmiG+goaaKRZA6LKUO35oK6EsM0/kjPK32Yw7URqrq3Q+Nvbbt8Usss+IekL7CRn83dYmw==" crossorigin="anonymous"></script>
@endsection

@section('title')
    Benvenuto - {{ $user->name }}
@endsection

@section('page')
    user_index
@endsection

@section('main')
    
<div id="dashboard_index_center">
    {{-- prima card --}}
    <div class="dashboard_card info_restaurant">
      <h2>{{ $user->infoRestaurant->name }}</h2>
      <ul>
        <li>
          <i class="fas fa-map-marker-alt"></i>
          {{ $user->infoRestaurant->address }}
        </li>
        <li>
          <i class="fas fa-info-circle"></i> 
          {{ $user->infoRestaurant->description }}
        </li>
        <li>
          <i class="fas fa-clock"></i>
          {{  substr($user->infoRestaurant->opening_time, -8, 5) }} - {{  substr($user->infoRestaurant->closing_time, -8, 5) }}
        </li>
        <li>
          <i class="fas fa-id-card"></i>
          {{ $user->infoRestaurant->PIVA }}
        </li>
        <li>
          @foreach ($user->categories as $category)
              <span style="color:{{ $category->color }}" class="mr-1">#{{ $category->name }}</span>
          @endforeach
        </li>
      </ul>
    </div>
    {{-- !prima card --}}

    {{-- seconda card --}}
    <div class="dashboard_card img_restaurant">
      <img src="{{ ( str_contains($user->infoRestaurant->img_path, 'images/') ) ? asset('storage/' . $user->infoRestaurant->img_path) : $user->infoRestaurant->img_path }}" alt="{{ $user->infoRestaurant->name }}">
    </div>
    {{-- !seconda card --}}

    {{-- terza card --}}
    <div class="dashboard_card orders_list">

      <h2>Ultimi ordini</h2>

      <ul>

        @foreach ($orders as $order)
        <li class="orders_card">
           <h4>{{ $order->name }}</h4>
           <p class="orders_card_total_price"><span>Prezzo totale: </span><span class="price_span">{{ number_format($order->price,2,",",".") }}???</span></p>
           <p>Email: {{ $order->email }}</p>

        </li> 
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

@endsection

@section('script')
    <script> 
        let userId = {{ $user->id }};
    </script>
      
    <script src="{{ asset('js/chart.js') }}"></script>
@endsection