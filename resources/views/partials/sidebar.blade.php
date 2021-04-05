<div class="dashboard_side_menu">
  <ul>
    <li>
      <h3>{{ $user->name }}</h3>
    </li>

    <li>
      <a href="{{ url('/') }}" class="buttons_style" >Vai alla homepage</a>
    </li>

    <li>
      <a href="{{ route('dashboard.users.index') }}" class="buttons_style  @if(Route::currentRouteName() == 'dashboard.users.index') active_side_btn @endif">Visualizza il tuo ristorante</a>
    </li>

    <li>
      <a href="{{ route('dashboard.plates.index') }}" class="buttons_style  @if(Route::currentRouteName() == 'dashboard.plates.index') active_side_btn @endif">Visualizza i tuoi piatti</a>
    </li>

    @if (Route::currentRouteName() == 'dashboard.plates.index' )
    <li>
      <a href="{{ route('dashboard.plates.create') }}" class="buttons_style">Crea un piatto</a>
    </li>
    @endif

    @if (Route::currentRouteName() == 'dashboard.users.index' )
    <li>
      <a href="{{ route('dashboard.users.edit', $user->id) }}" class="buttons_style">Modifica il tuo ristorante</a>
    </li>
    @endif


    <li>
      <a href="{{ route('dashboard.orders') }}" class="buttons_style  @if(Route::currentRouteName() == 'dashboard.orders') active_side_btn @endif">Visualizza i tuoi ordini</a>
    </li>

      <li>
          @if (Route::has('login'))
              <div class="top-right links buttons_container">
                  @auth
                      <form action="{{ route('logout') }}" method="POST">
                          @csrf
                          <button type="submit" class="buttons_style">Logout</button>
                      </form>
                  @endauth    
              </div>
          @endif
      </li>
  </ul>            
</div>