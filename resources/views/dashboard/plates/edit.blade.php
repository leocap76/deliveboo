<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  {{-- favicon --}}
  <link rel="shortcut icon" type="image/x-icon"href="img/favicon.png">

  <title>Modifica - {{ $plate->name }}</title>
</head>
<body class="dashboard">

  @include('partials.header')

  <main>
    <div class="container">

      <h2>Modifica del piatto {{ $plate->name }}</h2>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
  
      <form action="{{ route('dashboard.plates.update', $plate->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <div class="form-group">
          <label for="name">Nome</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Nome del piatto" value="{{ $plate->name }}" required maxlength="100">
        </div>
    
        <div class="form-group">
          <label for="description">Descrizione</label>
          <textarea name="description" id="description" rows="4" class="form-control" placeholder="Descrizione del piatto" required>{{ $plate->description }}</textarea>
        </div>
    
        <div class="form-group">
          <label for="ingredients">Ingredienti</label>
          <textarea name="ingredients" id="ingredients" rows="4" class="form-control" placeholder="Ingredienti del piatto" required>{{ $plate->ingredients }}</textarea>
        </div>
    
        <div class="form-group">
          <label for="price">Prezzo</label>
          <input type="number" step="0.01"
          class="form-control" id="price" name="price" placeholder="Prezzo del piatto" value="{{ $plate->price }}" required min="0.01">
        </div>
  
        <div class="form-group">
          <label for="img_path">Immagine</label>
          <input type="file" id="img_path" name="img_path" accept="image/*">
          <div>
              <img src="{{ ( str_contains($plate->img_path, 'images/') ) ? asset('storage/' . $plate->img_path) : $plate->img_path }}" alt="{{ $plate->name }}">
          </div>
        </div>
    
        <div class="form-group">
          <label for="vegan">Vegano</label>
          <input type="checkbox" id="vegan" name="vegan" value="1" @if($plate->vegan == 1) checked @endif>
        </div>
    
        <div class="form-group">
          <label for="vegetarian">Vegetariano</label>
          <input type="checkbox" id="vegetarian" name="vegetarian" value="1" @if($plate->vegetarian == 1) checked @endif>
        </div>
    
        <div class="form-group">
          <label for="spicy">Piccante</label>
          <input type="checkbox" id="spicy" name="spicy" value="1" @if($plate->spicy == 1) checked @endif>
        </div>
    
        <div class="form-group">
          <label for="glutenfree">Gluten free</label>
          <input type="checkbox" id="glutenfree" name="glutenfree" value="1" @if($plate->glutenfree == 1) checked @endif>
        </div>
    
        <div class="form-group">
          <label for="available">Disponibile</label>
          <input type="checkbox" id="available" name="available" value="1" @if($plate->available == 1) checked @endif>
        </div>
    
  
        <button type="submit" class="btn btn-success">Modifica piatto</button>
        <a href="{{ route('dashboard.plates.index') }}" class="btn btn-success">Torna indietro</a>
    
      </form>
    </div>
  </main>
  
</body>
</html>