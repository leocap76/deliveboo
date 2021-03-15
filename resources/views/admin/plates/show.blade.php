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
      
        <p>{{ $plate->name }}</p>
        <img src="{{ ( str_contains($plate->img_path, 'images/') ) ? asset('storage/' . $plate->img_path) : $plate->img_path }}" alt="{{ $plate->name }}" style="width: 200px;">

        <div>
          <a href="{{ route('admin.plates.edit', $plate->id) }}">modifica</a>
          <a href="{{ route('admin.plates.index') }}">torna indietro</a>
        </div>

      </div>
      
    </body>
</html>