<header>
    <div class="container header_container">
        <div class="header_left">
            <a href="{{ url('/') }}">
              <img src="{{ asset('img/deliverboomarchio.jpg') }}" alt="deliveboo" class="logo_img">
            </a>        
        </div>
        
        <div class="header_right">

            <div id="hamurger_menu_container" >
                <svg id="hamburger_menu" class="ham hamRotate ham1" viewBox="0 0 100 100" width="80" onclick="click()">
                    <path
                          class="line top"
                          d="m 30,33 h 40 c 0,0 9.044436,-0.654587 9.044436,-8.508902 0,-7.854315 -8.024349,-11.958003 -14.89975,-10.85914 -6.875401,1.098863 -13.637059,4.171617 -13.637059,16.368042 v 40" />
                    <path
                          class="line middle"
                          d="m 30,50 h 40" />
                    <path
                          class="line bottom"
                          d="m 30,67 h 40 c 12.796276,0 15.357889,-11.717785 15.357889,-26.851538 0,-15.133752 -4.786586,-27.274118 -16.667516,-27.274118 -11.88093,0 -18.499247,6.994427 -18.435284,17.125656 l 0.252538,40" />
                  </svg>
            </div>

            <section id="header_buttons_section">
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
            </section>
            
        </div>
     </div>

     <script src="{{ asset('js/hamburgerIcon.js') }}"></script>
</header>

<section id="dropdown_menu" class="closed">
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
</section>