@extends('dashboard.layout')

@section('title')
  I tuoi piatti
@endsection

@section('page')
  plates_index
@endsection

@section('main')  

<div class="plates_bottom">

    @foreach ($plates as $plate)
        <div class="card plate"> 
          <img class="card-img-top" src="{{ ( str_contains($plate->img_path, 'images/') ) ? asset('storage/' . $plate->img_path) : $plate->img_path }}" alt="{{ $plate->name }}" alt="{{ $plate->name }}"> 
          <div class="card-body"> 

            <div class="scroll">
              <h5 class="card-title">{{ $plate->name }}</h5> 
              <p>{{ $plate->ingredients }}</p>

              <div>
                <p class="description">{{ $plate->description }}</p>
  
                @if ($plate->vegan == 1)
                  <p>Vegan: <i class="fas fa-check"></i></p>
                @endif
        
                @if($plate->vegetarian == 1)
                  <p>Vegetarian: <i class="fas fa-check"></i></p>
                @endif
        
                @if($plate->spicy == 1)
                  <p>Piccante: <i class="fas fa-check"></i></p>
                @endif
        
                @if($plate->glutenfree == 1)
                  <p>Gluten-free: <i class="fas fa-check"></i></p>
                @endif
        
                @if($plate->available == 1)
                  <p>Disponibile: <i class="fas fa-check"></i></p>
                @endif
              </div>

              <p>Prezzo: {{ $plate->price }}€</p>
            </div>

            <form action="{{ route('dashboard.plates.destroy', $plate->id) }}" method="post">
              @csrf
              @method('DELETE')
              <a href="{{ route('dashboard.plates.edit', $plate->id) }}" class="btn btn-secondary mb-3">Modifica</a><br>
              <button type="submit" class="btn btn-danger mb-3">Cancella</button>
            </form>

          </div>

        </div> 
    @endforeach
  </div>
@endsection