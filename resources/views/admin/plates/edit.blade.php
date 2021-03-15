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
    <form action="{{ route('admin.plates.update', $plate->id) }}" method="post">
      @csrf
      @method('PUT')
  
      <div class="form-group">
        <label for="plate_name">Nome</label>
        <input type="text" class="form-control" id="plate_name" name="plate_name" placeholder="Nome del piatto" value="{{ $plate->plate_name }}">
      </div>
  
      <div class="form-group">
        <label for="plate_description">Descrizione</label>
        <textarea name="plate_description" id="plate_description" rows="4" class="form-control" placeholder="Descrizione del piatto">{{ $plate->plate_description }}</textarea>
      </div>
  
      <div class="form-group">
        <label for="plate_ingredients">Ingredienti</label>
        <textarea name="plate_ingredients" id="plate_ingredients" rows="4" class="form-control" placeholder="Ingredienti del piatto">{{ $plate->plate_ingredients }}</textarea>
      </div>
  
      <div class="form-group">
        <label for="plate_price">Prezzo</label>
        <input type="number" step="0.01"
        class="form-control" id="plate_price" name="plate_price" placeholder="Prezzo del piatto" value="{{ $plate->plate_price }}">
      </div>
  
      <div class="form-group">
        <label for="plate_vegan">Vegano</label>
        <input type="checkbox" id="plate_vegan" name="plate_vegan" value="1" @if($plate->plate_vegan == 1) checked @endif>
      </div>
  
      <div class="form-group">
        <label for="plate_vegetarian">Vegetariano</label>
        <input type="checkbox" id="plate_vegetarian" name="plate_vegetarian" value="1" @if($plate->plate_vegetarian == 1) checked @endif>
      </div>
  
      <div class="form-group">
        <label for="plate_spicy">Piccante</label>
        <input type="checkbox" id="plate_spicy" name="plate_spicy" value="1" @if($plate->plate_spicy == 1) checked @endif>
      </div>
  
      <div class="form-group">
        <label for="plate_glutenfree">Gluten free</label>
        <input type="checkbox" id="plate_glutenfree" name="plate_glutenfree" value="1" @if($plate->plate_glutenfree == 1) checked @endif>
      </div>
  
      <div class="form-group">
        <label for="plate_available">Disponibile</label>
        <input type="checkbox" id="plate_available" name="plate_available" value="1" @if($plate->plate_available == 1) checked @endif>
      </div>
  
      <button type="submit" class="btn btn-success">Modifica piatto</button>
  
    </form>
  </div>
  
</body>
</html>