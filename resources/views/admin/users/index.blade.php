<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Crud Users</title>
    </head>
    <body>

      @foreach ($users as $user)
          <p>{{ $user->infoRestaurant->restaurant_name }}</p>
      @endforeach

      @foreach ($categories as $category)
          <p>{{ $category->category_name }}</p>
      @endforeach
      
    </body>
</html>