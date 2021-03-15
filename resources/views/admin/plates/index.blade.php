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
        @if (\Session::has('message'))
          <div class="alert alert-success">
              <ul>
                  <li>{!! \Session::get('message') !!}</li>
              </ul>
          </div>
        @endif
  
  
        @foreach ($plates as $plate)
            <p>{{ $plate->plate_name }}</p>
            <a href="{{ route('admin.plates.show', $plate->id) }}">info</a>
            <a href="{{ route('admin.plates.edit', $plate->id) }}">modifica</a>
            <form action="{{ route('admin.plates.destroy', $plate->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Cancella</button>
            </form>
        @endforeach

        <div>
          <a href="{{ route('admin.plates.create') }}" class="btn btn-primary">crea</a>
        </div>

      </div>


      
    </body>
</html>