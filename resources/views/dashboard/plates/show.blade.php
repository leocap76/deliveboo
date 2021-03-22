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
      <link rel="shortcut icon" type="image/x-icon"href="img/favicon.png">
      
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
      <title>Descrizione Piatto {{ $plate->name }}</title>
    </head>
    <body>

      <div class="container">      
      
        <h1>{{ $plate->name }}</h1>
        <img src="{{ ( str_contains($plate->img_path, 'images/') ) ? asset('storage/' . $plate->img_path) : $plate->img_path }}" alt="{{ $plate->name }}" style="width: 200px;">
        
        <h2>Descrizione</h2>
        <p>{{ $plate->description }}</p>

        <h2>Ingredienti</h2>
        <p>{{ $plate->ingredients }}</p>

        <h2>Prezzo</h2>
        <p>{{ $plate->price }} €</p>

        @if ($plate->vegan == 1)
          <p>Vegan: 'spunta'</p>
        @endif

        @if($plate->vegetarian == 1)
          <p>Vegetarian: 'spunta'</p>
        @endif

        @if($plate->spicy == 1)
          <p>Piccante: 'spunta'</p>
        @endif

        @if($plate->glutenfree == 1)
          <p>Gluten-free: 'spunta'</p>
        @endif

        @if($plate->available == 1)
          <h5> available: 'spunta'</h5>
        @endif

        <div>
          <a href="{{ route('dashboard.plates.edit', $plate->id) }}" class="btn btn-primary">modifica</a>
          <a href="{{ route('dashboard.plates.index') }}" class="btn btn-primary">torna indietro</a>
        </div>

      </div>
      {{-- footer --}}
      @include('partials.footer')
      {{-- !footer --}}
    </body>
</html>