<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  {{-- favicon --}}
  <link rel="shortcut icon" type="image/x-icon" href="http://127.0.0.1:8000/img/favicon.png">

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <title>Creazione piatto</title>
</head>
<body class="dashboard">

  @include('partials.header')

  <main>
    <div class="container">
    
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
  
      <form action="{{ route('dashboard.plates.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
    
        <div class="form-group">
          <label for="name">Nome</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Nome del piatto" required maxlength="100">
        </div>
    
        <div class="form-group">
          <label for="description">Descrizione</label>
          <textarea name="description" id="description" rows="4" class="form-control" placeholder="Descrizione del piatto" required></textarea>
        </div>
    
        <div class="form-group">
          <label for="ingredients">Ingredienti</label>
          <textarea name="ingredients" id="ingredients" rows="4" class="form-control" placeholder="Ingredienti del piatto" required></textarea>
        </div>
    
        <div class="form-group">
          <label for="price">Prezzo</label>
          <input type="number" step="0.01"
          class="form-control" id="price" name="price" placeholder="Prezzo del piatto" required min="0.01">
        </div>
  
        <div class="form-group">
          <label for="img_path">Immagine</label>
          <input type="file" id="img_path" name="img_path" accept="image/*" required>
        </div>
    
        <div class="form-group">
          <label for="vegan">Vegano</label>
          <input type="checkbox" id="vegan" name="vegan" value="1">
        </div>
    
        <div class="form-group">
          <label for="vegetarian">Vegetariano</label>
          <input type="checkbox" id="vegetarian" name="vegetarian" value="1">
        </div>
    
        <div class="form-group">
          <label for="spicy">Piccante</label>
          <input type="checkbox" id="spicy" name="spicy" value="1">
        </div>
    
        <div class="form-group">
          <label for="glutenfree">Gluten free</label>
          <input type="checkbox" id="glutenfree" name="glutenfree" value="1">
        </div>
    
        <div class="form-group">
          <label for="available">Disponibile</label>
          <input type="checkbox" id="available" name="available" value="1">
        </div>
    
  
        <button type="submit" class="btn btn-success">Crea piatto</button>
        <a href="{{ route('dashboard.plates.index') }}" class="btn btn-success">Torna indietro</a>
  
      </form>
    </div>
  </main>
  
</body>
</html>