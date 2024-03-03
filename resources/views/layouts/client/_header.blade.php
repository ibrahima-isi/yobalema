<header class="site-navbar site-navbar-target" role="banner">

    <div class="container">
        <div class="row align-items-center position-relative">

            <div class="col-3 ">
                <div class="site-logo">
                    <a href="{{ route('index') }}">{{ config('app.name', 'Laravel') }}</a>
                </div>
            </div>

            <div class="col-9  text-right">


                <span class="d-inline-block d-lg-none">
                    <a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white">
                        <span class="icon-menu h3 text-white"></span>
                    </a>
                </span>



                <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav ml-auto ">
                        <li class="active"><a href="{{ route('index') }}" class="nav-link">Home</a></li>
                        <li><a href="services.html" class="nav-link">Services</a></li>
                        <li><a href="cars.html" class="nav-link">Cars</a></li>
                        <li><a href="about.html" class="nav-link">About</a></li>
                        <li><a href="blog.html" class="nav-link">Blog</a></li>

                        @guest

                            <li>
                                <a href="{{ route('login') }}" class="nav-link">Se Connecter</a>
                            </li>

                            <li>
                                <a href="{{ route('register') }}" class="nav-link">S'inscrire</a>
                            </li>

                        @endguest
                        @auth

                            @if(Auth::user()->role_user_id == 1 && Route::has('admin.dashboard'))
                                <li>
                                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                        {{ __('Dashboard') }}
                                    </a>
                                </li>
                            @endif

                            @if(Route::has('client.profil'))
                                <li>
                                    <a href="{{ route('client.profil') }}" class="nav-link">Login</a>
                                </li>
                            @endif

                            <form action="{{ route('logout') }}" method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger  mx-3 d-inline"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    {{ __('Se Déconnecter') }}
                                </button>
                            </form>
                        @endauth

                    </ul>
                </nav>
            </div>


        </div>
    </div>

</header>
