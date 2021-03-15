<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>Document</title>
</head>
<body>

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

    <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('POST')
  
      <div class="form-group">
        <label for="name">Nome del ristorante</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nome del ristorante" value="{{ old('name') }}">
      </div>

      <div class="form-group">
        <label for="address">Indirizzo del ristorante</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Indirizzo del ristorante" value="{{ old('address') }}">
      </div>
  
      <div class="form-group">
        <label for="description">Descrizione del ristorante</label>
        <textarea name="description" id="description" rows="4" class="form-control" placeholder="Descrizione del ristorante">{{ old('description') }}</textarea>
      </div>

      <div class="form-group">
        <label for="img_path">Immagine del ristorante</label>
        <input type="file" id="img_path" name="img_path" accept="image/*">
      </div>

      <div class="form-group">
        <label for="PIVA">Partita IVA ristorante</label>
        <input type="text" class="form-control" id="PIVA" name="PIVA" placeholder="Partita IVA" value="{{ old('PIVA') }}">
      </div>

      <div class="form-group">
        <label for="opening_time">Orario apertura del ristorante</label>
        <input type="text" class="form-control" id="opening_time" name="opening_time" placeholder="Orario di apertura (HH:MM:SS)" value="{{ old('opening_time') }}">
      </div>

      <div class="form-group">
        <label for="closing_time">Orario chiusura del ristorante</label>
        <input type="text" class="form-control" id="closing_time" name="closing_time" placeholder="Orario di chiusura (HH:MM:SS)" value="{{ old('closing_time') }}">
      </div>
  
      <button type="submit" class="btn btn-success">Crea Ristorante</button>
  
    </form>
  </div>
  
</body>
</html>