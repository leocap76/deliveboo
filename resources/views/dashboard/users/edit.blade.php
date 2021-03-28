<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="{{ asset('js/select2.js') }}" defer></script>

  {{-- favicon --}}
  <link rel="shortcut icon" type="image/x-icon" href="http://127.0.0.1:8000/img/favicon.png">

  <title>Modifica - {{ $infoRestaurant->name }}</title>
</head>
<body class="dashboard restaurant_edit">

  @include('partials.header')

  <main>
    <div class="container">

      <h2>Modifica del ristorante {{ $infoRestaurant->name }}</h2>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
  
      <form action="{{ route('dashboard.users.update', $infoRestaurant->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <div class="form-group">
          <label for="name">Nome del ristorante</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Nome del ristorante" value="{{ $infoRestaurant->name }}" required maxlength="100">
        </div>
  
        <div class="form-group">
          <label for="address">Indirizzo del ristorante</label>
          <input type="text" class="form-control" id="address" name="address" placeholder="Indirizzo del ristorante" value="{{ $infoRestaurant->address }}" required>
        </div>
    
        <div class="form-group">
          <label for="description">Descrizione del ristorante</label>
          <textarea name="description" id="description" rows="4" class="form-control" placeholder="Descrizione del ristorante" required>{{ $infoRestaurant->description }}</textarea>
        </div>
  
        <div class="form-group">
          <label for="img_path">Immagine del ristorante</label>
          <input type="file" id="img_path" name="img_path" accept="image/*">
          <div>
            <img src="{{ ( str_contains($user->infoRestaurant->img_path, 'images/') ) ? asset('storage/' . $user->infoRestaurant->img_path) : $user->infoRestaurant->img_path }}" alt="{{ $user->infoRestaurant->name }}">
          </div>
        </div>
  
        <div class="form-group">
          <label for="PIVA">Partita IVA ristorante</label>
          <input type="text" class="form-control" id="PIVA" name="PIVA" placeholder="Partita IVA" value="{{ $infoRestaurant->PIVA }}" required maxlength="11" minlength="11">
        </div>
  
        <div class="form-group">
          <label for="opening_time">Orario apertura del ristorante</label>
          <input type="time" class="form-control" id="opening_time" name="opening_time" placeholder="Orario di apertura (HH:MM:SS)" value="{{ $infoRestaurant->opening_time }}" required>
        </div>
  
        <div class="form-group">
          <label for="closing_time">Orario chiusura del ristorante</label>
          <input type="time" class="form-control" id="closing_time" name="closing_time" placeholder="Orario di Chiusura (HH:MM:SS)" value="{{ $infoRestaurant->closing_time }}" required>
        </div>
  
        <div class="form-group">
            <label for="category_id">Categoria</label>
            <select class="form-control" name="category_id[]" id="category_id" multiple required>
                <option value="">Scegli la categoria</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" @if ($user->categories->contains($category->id)) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    
        <button type="submit" class="btn btn-success">Modifica Ristorante</button>
        <a href="{{ route('dashboard.users.index') }}" class="btn btn-success">Torna indietro</a>
    
      </form>
    </div>
  </main>
  
</body>
</html>