<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  {{-- fontawesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.css" integrity="sha512-9iWaz7iMchMkQOKA8K4Qpz6bpQRbhedFJB+MSdmJ5Nf4qIN1+5wOVnzg5BQs/mYH3sKtzY+DOgxiwMz8ZtMCsw==" crossorigin="anonymous" />
  {{-- /fontawesome --}}

  {{-- favicon --}}
  <link rel="shortcut icon" type="image/x-icon" href="http://127.0.0.1:8000/img/favicon.png">

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>Pagina ordini - {{ $user->name }}</title>
</head>
<body class="dashboard">

  {{-- header --}}
  @include('partials.header')
  {{-- /header --}}

  @include('partials.sidebar')

  <main>

    <section id="dashboard_orders">
      <div class="dashboard_orders_top">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nome</th>
              <th>Indirizzo</th>
              <th>Piatti</th>
              <th>Email</th>
              <th>Prezzo</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)
              <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->address }}</td>
                <td>
                  @foreach (json_decode($order->arrPlates) as $plate)
                      <p class="my-0">{{ $plate->name }} <strong>x{{ $plate->amount }}</strong></p>
                  @endforeach
                </td>
                <td>{{ $order->email }}</td>
                <td>{{ number_format($order->price, 2, ",", ".") }}€</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="dashboard_orders_bottom">
        <h2>Qua ci vanno i grafici!</h2>
      </div>
    </section>
  </main>

  {{-- footer --}}
  @include('partials.footer')
  {{-- !footer --}}
  
</body>
</html>