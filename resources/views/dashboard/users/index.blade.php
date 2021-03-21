<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        {{-- fontawesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.css" integrity="sha512-9iWaz7iMchMkQOKA8K4Qpz6bpQRbhedFJB+MSdmJ5Nf4qIN1+5wOVnzg5BQs/mYH3sKtzY+DOgxiwMz8ZtMCsw==" crossorigin="anonymous" />
        {{-- /fontawesome --}}

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <title>Benvenuto - {{ $user->name }}</title>
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

                <h2>Informazioni utente</h2>
                <p>Nome utente: {{ $user->name }}</p>
                <p>Email: {{ $user->email }}</p>

                <h2>Informazioni Ristorante</h2>
                <p>Nome ristorante: {{ $user->infoRestaurant->name }}</p>
                <p>Indirizzo ristorante: {{ $user->infoRestaurant->address }}</p>
                <p>Descrizione ristorante: {{ $user->infoRestaurant->description }}</p>
                <p>Immagine ristorante: </p>
                <img src="{{ ( str_contains($user->infoRestaurant->img_path, 'images/') ) ? asset('storage/' . $user->infoRestaurant->img_path) : $user->infoRestaurant->img_path }}" alt="{{ $user->infoRestaurant->name }}" style="width: 200px;">
                <p>Partita IVA: {{ $user->infoRestaurant->PIVA }}</p>
                <p>Orario apertura: {{ $user->infoRestaurant->opening_time }}</p>
                <p>Orario Chiusura: {{ $user->infoRestaurant->closing_time }}</p>
                @foreach ($user->categories as $category)
                    <p class="badge" style="background-color: {{ $category->color }}">{{ $category->name }}</p>
                @endforeach

                <div>
                    <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-primary mb-3">Modifica il ristorante</a>
                    <a href="{{ route('dashboard.plates.index') }}" class="btn btn-primary mb-3">Aggiungi/Modifica Piatti</a>
                </div>
            </div>

        </main>
    {{-- footer --}}
    @include('partials.footer')
    {{-- !footer --}}
    </body>
</html>