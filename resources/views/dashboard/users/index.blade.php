<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        {{-- fontawesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.css" integrity="sha512-9iWaz7iMchMkQOKA8K4Qpz6bpQRbhedFJB+MSdmJ5Nf4qIN1+5wOVnzg5BQs/mYH3sKtzY+DOgxiwMz8ZtMCsw==" crossorigin="anonymous" />
        {{-- /fontawesome --}}

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <title>Benvenuto - {{ $user->name }}</title>
    </head>
    <body class="dashboard">

        @include('partials.header')

        <main>

          <div class="container-fluid">

            <div id="dashboard_side_menu">
              <ul>
                <li>
                  <img src="https://lh3.googleusercontent.com/proxy/bopozhBhe73VjFnoKuPGh9_XtQ5zdvYjSyCERjBxelsVtIV1uv2Y4Wvp811XID49h9zFjZqVM1BNwjPyv5hFNW5-BxXHOQhg39NB" alt="">
                  <div>{{ $user->name }}</div>
                </li>
  
                <li>
                  <a href="{{ url('/') }}" class="buttons_style">Vai alla homepage</a>
                </li>
  
                <li>
                  <a href="{{ route('dashboard.users.edit', $user->id) }}" class="buttons_style">Modifica il tuo ristorante</a>
                </li>
  
                <li>
                  <a href="{{ route('dashboard.plates.index') }}" class="buttons_style">Visualizza i tuoi piatti</a>
                </li>
  
                <li>
                  <a href="" class="buttons_style">Visualizza i tuoi ordini</a>
                </li>
  
                <li>
                  @if (Route::currentRouteName() == 'dashboard.users.index' )
                      @if (Route::has('login'))
                          <div class="top-right links buttons_container">
                              @auth
                                  <form action="{{ route('logout') }}" method="POST">
                                      @csrf
                                      <button type="submit" class="buttons_style">Logout</button>
                                  </form>
                              @endauth    
                          </div>
                      @endif
                  @endif
                </li>
              </ul>            
            </div>
  
            <div id="dashboard_center">

              <div class="monthly_stats">
                <h2>Statistiche mensili</h2>

                <div class="monthly_stats_content">

                </div>
              </div>

              <div class="last_orders">
                <h2>Ultimi ordini</h2>

                <div class="last_orders_content"> 

                </div>
              </div>

              <div class="plates_in_menu">
                <h2>Piatti presenti nel menu (per categoria)</h2>

                <div class="plates_in_menu_content">

                </div>
              </div>
            </div>

          </div>

        </main>

        {{-- @if (\Session::has('message'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('message') !!}</li>
            </ul>
        </div>
        @endif

        <h2>Informazioni utente</h2>
        <p>Nome utente: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>

        <h2>Informazioni Ristorante</h2>
        <p>Nome ristorante: {{ $user->infoRestaurant->name }}</p>
        <p>Indirizzo ristorante: {{ $user->infoRestaurant->address }}</p>
        <p>Descrizione ristorante: {{ $user->infoRestaurant->description }}</p>
        <p>Immagine ristorante: </p>
        <img src="{{ ( str_contains($user->infoRestaurant->img_path, 'images/') ) ? asset('storage/' . $user->infoRestaurant->img_path) : $user->infoRestaurant->img_path }}" alt="{{ $user->infoRestaurant->name }}" style="width: 200px;">
        <p>Partita IVA: {{ $user->infoRestaurant->PIVA }}</p>
        <p>Orario apertura: {{ $user->infoRestaurant->opening_time }}</p>
        <p>Orario Chiusura: {{ $user->infoRestaurant->closing_time }}</p>
        @foreach ($user->categories as $category)
            <p class="badge" style="background-color: {{ $category->color }}">{{ $category->name }}</p>
        @endforeach

        <div>
            <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-primary mb-3">Modifica il ristorante</a>
            <a href="{{ route('dashboard.plates.index') }}" class="btn btn-primary mb-3">Aggiungi/Modifica Piatti</a>
        </div>   --}}







    {{-- footer --}}
    @include('partials.footer')
    {{-- !footer --}}
    </body>
</html>