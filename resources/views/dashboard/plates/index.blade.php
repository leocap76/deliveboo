@extends('dashboard.layout')

@section('title')
  I tuoi piatti
@endsection

@section('page')
  plates_index
@endsection

@section('main')  
  @if (\Session::has('message'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('message') !!}</li>
        </ul>
    </div>
  @endif

  <div class="plates_bottom">
    @foreach ($plates as $plate)
        <div class="card plate"> 
          <img class="card-img-top" src="{{ ( str_contains($plate->img_path, 'images/') ) ? asset('storage/' . $plate->img_path) : $plate->img_path }}" alt="{{ $plate->name }}" alt="{{ $plate->name }}"> 
          <div class="card-body"> 

            <h5 class="card-title">{{ $plate->name }}</h5> 

            <form action="{{ route('dashboard.plates.destroy', $plate->id) }}" method="post">
              @csrf
              @method('DELETE')
              <a href="{{ route('dashboard.plates.show', $plate->slug) }}" class="btn btn-secondary mb-3">info</a><br>
              <a href="{{ route('dashboard.plates.edit', $plate->id) }}" class="btn btn-secondary mb-3">modifica</a><br>
              <button type="submit" class="btn btn-danger mb-3">Cancella</button>
            </form>

          </div>

        </div> 
    @endforeach
  </div>
@endsection