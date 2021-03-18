<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">

      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">

      <title>Crud Users</title>
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
    
    
          @foreach ($plates as $plate)
              <h2>{{ $plate->name }}</h2>
              <img src="{{ ( str_contains($plate->img_path, 'images/') ) ? asset('storage/' . $plate->img_path) : $plate->img_path }}" alt="{{ $plate->name }}" style="width: 200px;" class="mb-3">
              <div>
                <form action="{{ route('admin.plates.destroy', $plate->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('admin.plates.show', $plate->slug) }}" class="btn btn-secondary mb-3">info</a>
                    <a href="{{ route('admin.plates.edit', $plate->id) }}" class="btn btn-secondary mb-3">modifica</a>
                    <button type="submit" class="btn btn-danger mb-3">Cancella</button>
                </form>
              </div>
          @endforeach
  
          <div>
            <a href="{{ route('admin.plates.create') }}" class="btn btn-primary mb-3">crea</a>
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary mb-3">Info ristorante/utente</a>
          </div>
  
        </div>
  
      </main>
      
    </body>
</html>