<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  {{-- favicon --}}
  <link rel="shortcut icon" type="image/x-icon"href="img/favicon.png">

  {{-- style --}}
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <script src="{{ asset('js/select2.js') }}" defer></script>

  <title>Crea un ristorante</title>
</head>
<body class="dashboard">

  @include('partials.header')

  <main>
    <div class="container">

      <h2>Crea il tuo ristorante</h2>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
  
      <form action="{{ route('dashboard.users.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
    
        <div class="form-group">
          <label for="name">Nome del ristorante</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Nome del ristorante" value="{{ old('name') }}" required maxlength="100">
        </div>
  
        <div class="form-group">
          <label for="address">Indirizzo del ristorante</label>
          <input type="text" class="form-control" id="address" name="address" placeholder="Indirizzo del ristorante" value="{{ old('address') }}" required>
        </div>
    
        <div class="form-group">
          <label for="description">Descrizione del ristorante</label>
          <textarea name="description" id="description" rows="4" class="form-control" placeholder="Descrizione del ristorante" required>{{ old('description') }}</textarea>
        </div>
  
        <div class="form-group">
          <label for="img_path">Immagine del ristorante</label>
          <input type="file" id="img_path" name="img_path" accept="image/*" required>
        </div>
  
        <div class="form-group">
          <label for="PIVA">Partita IVA ristorante</label>
          <input type="text" class="form-control" id="PIVA" name="PIVA" placeholder="Partita IVA" value="{{ old('PIVA') }}" required maxlength="11" minlength="11">
        </div>
  
        <div class="form-group">
          <label for="opening_time">Orario apertura del ristorante</label>
          <input type="time" class="form-control" id="opening_time" name="opening_time" placeholder="Orario di apertura (HH:MM:SS)" value="{{ old('opening_time') }}" required>
        </div>
  
        <div class="form-group">
          <label for="closing_time">Orario chiusura del ristorante</label>
          <input type="time" class="form-control" id="closing_time" name="closing_time" placeholder="Orario di chiusura (HH:MM:SS)" value="{{ old('closing_time') }}" required>
        </div>
  
  
        <div class="form-group">
          <label for="category_id">Categorie</label>
          <select class="form-control" name="category_id[]" id="category_id" multiple required>
              @foreach ($categories as $category)          
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
          </select>
        </div>
  
    
        <button type="submit" class="btn btn-success">Crea Ristorante</button>
    
      </form>
    </div>
  </main>
 
</body>
</html>