@extends('dashboard.layout')

@section('title')
Ordini - {{ $user->name }}
@endsection

@section('page')
  user_orders
@endsection

@section('main')
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
@endsection