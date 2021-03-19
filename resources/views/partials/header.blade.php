<header>
    <div class="container header_container">
        <div class="header_left">
            <a href="{{ url('/') }}">
              <img src="{{ asset('img/deliverboomarchio.jpg') }}" alt="deliveboo" class="logo_img">
            </a>        
        </div>
        
        <div class="header_right">

            @if (Route::currentRouteName() == '' )
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a href="{{ route('dashboard.users.index') }}" class="header_buttons">Pannello di controllo</a>
                                <button type="submit" class="header_buttons">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="header_buttons">Accedi</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="header_buttons">Registrati</a>
                            @endif
                        @endauth
                    </div>
                @endif
            @elseif(Route::currentRouteName() == 'dashboard.users.index')
                <div class="top-right links">
                    <a href="{{ route('dashboard.plates.index') }}" class="header_buttons">Vai ai piatti</a>
                    <a href="{{ url('/') }}" class="header_buttons">Vai alla homepage</a>
                </div>
            @elseif(Route::currentRouteName() == 'dashboard.plates.index' || Route::currentRouteName() == 'dashboard.plates.create')
                <div class="top-right links">
                    <a href="{{ route('dashboard.users.index') }}" class="header_buttons">Vai alle informazioni</a>
                    <a href="{{ url('/') }}" class="header_buttons">Vai alla homepage</a>
                </div>
            @endif
        </div>
     </div>
</header>