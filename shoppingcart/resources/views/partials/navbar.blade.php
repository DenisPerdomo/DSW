<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/products" style="color:#777"><i class="fa fa-home"></i> Tienda Funko |</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if( true || Auth::check() )
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('products') && ! Request::is('products/create')? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/products')}}">
                            <span class="fa fa-list" aria-hidden="true"></span>
                            Funko Pop
                        </a>
                    </li>
                    <li class="nav-item {{  Request::is('products/create') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/products/create')}}">
                            <i class="fa fa-plus"></i> Nuevo Funko
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cart-show')}}"><i class="fa fa-shopping-cart"></i></a>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>
