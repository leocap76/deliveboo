<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
      <title>Crud Users</title>
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
      
    </body>
</html>