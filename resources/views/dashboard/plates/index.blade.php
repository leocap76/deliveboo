@extends('dashboard.layout')

@section('title')
  I tuoi piatti
@endsection

@section('page')
  plates_index
@endsection

@section('main')
  <div class="container-fluid">      
    @if (\Session::has('message'))
      <div class="alert alert-success">
          <ul>
              <li>{!! \Session::get('message') !!}</li>
          </ul>
      </div>
    @endif

    <div class="plates_bottom">
      @foreach ($plates as $plate)
          <div class="plate">
            <h2>{{ $plate->name }}</h2>
            <img src="{{ ( str_contains($plate->img_path, 'images/') ) ? asset('storage/' . $plate->img_path) : $plate->img_path }}" alt="{{ $plate->name }}" style="width: 200px;" class="mb-3">
            <form action="{{ route('dashboard.plates.destroy', $plate->id) }}" method="post">
                @csrf
                @method('DELETE')
                <a href="{{ route('dashboard.plates.show', $plate->slug) }}" class="btn btn-secondary mb-3">info</a><br>
                <a href="{{ route('dashboard.plates.edit', $plate->id) }}" class="btn btn-secondary mb-3">modifica</a><br>
                <button type="submit" class="btn btn-danger mb-3">Cancella</button>
            </form>
          </div>
      @endforeach
    </div>

  </div>
@endsection