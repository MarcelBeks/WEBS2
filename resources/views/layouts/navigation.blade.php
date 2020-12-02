<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @foreach($menuList as $menu)
                <li class="nav-item">
                    <a class="nav-link" href="{{ url($menu->link) }}">{{ $menu->label }} <span class="sr-only"></span></a>
                </li>
            @endforeach
        </ul>
        <ul class="navbar-nav ml-auto">
            <!-- Shopping Cart -->
                <li>
                    <a class="nav-link" href="{{ route('cart.products') }}">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Winkelwagen
                        <span>({{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }})</span>
                    </a>
                </li>
            <!-- Authentication Links -->
            @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('orders.my') }}">Mijn orders</a>
                    @if ( Auth::user()->hasrole('manager') )
                        <a class="dropdown-item" href="{{ route('producten-beheren') }}">{{ __('Producten beheren') }}</a>
                        <a class="dropdown-item" href="{{ route('categorieen-beheren') }}">{{ __('Categorieën beheren') }}</a>
                    @endif
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
      </div>
</nav>


    