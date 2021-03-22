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

      <title>I tuoi piatti</title>
    </head>
    <body class="dashboard">

      @include('partials.header')

      <main>

        <div class="container">      
          @if (\Session::has('message'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('message') !!}</li>
                </ul>
            </div>
          @endif
    
          <div class="plates_bottom">
            @foreach ($plates as $plate)
                <h2>{{ $plate->name }}</h2>
                <img src="{{ ( str_contains($plate->img_path, 'images/') ) ? asset('storage/' . $plate->img_path) : $plate->img_path }}" alt="{{ $plate->name }}" style="width: 200px;" class="mb-3">
                <div>
                  <form action="{{ route('dashboard.plates.destroy', $plate->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <a href="{{ route('dashboard.plates.show', $plate->slug) }}" class="btn btn-secondary mb-3">info</a><br>
                      <a href="{{ route('dashboard.plates.edit', $plate->id) }}" class="btn btn-secondary mb-3">modifica</a><br>
                      <button type="submit" class="btn btn-danger mb-3">Cancella</button>
                  </form>
                </div>
            @endforeach
          </div>

          <div class="plates_bottom_buttons">
            <a href="{{ route('dashboard.plates.create') }}" class="btn btn-primary mb-3">crea</a>
            <a href="{{ route('dashboard.users.index') }}" class="btn btn-primary mb-3">Info ristorante/utente</a>
          </div>
  
        </div>
  
      </main>
    {{-- footer --}}
    @include('partials.footer')
    {{-- !footer --}} 
    </body>
</html>