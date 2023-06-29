    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="{{ route('home') }}">@yield('site_name')</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            {{-- <!-- <a href="index.html" class="logo me-auto"><img src="{{asset('end_user')}}/assets/img/logo.png" alt="" class="img-fluid"></a>--> --}}

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="{{ route('home') }}#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('home') }}#about">About</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('home') }}#departments">Departments</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('home') }}#doctors">Doctors</a></li>
                    {{-- <li><a class="nav-link scrollto" href="#services">Services</a></li> --}}
                    {{-- <li><a class="nav-link scrollto" href="#contact">Contact</a></li> --}}
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
            @guest
                <a href="{{ route('login') }}" class="appointment-btn "><span class="d-none d-md-inline">Login</span></a>
            @endguest
            @auth

                <nav id="navbar" class="navbar order-last order-lg-0 me-4">
                    <ul>
                        <li><a class="nav-link scrollto"
                                href="@if (auth()->user()->type !== 'Patient') {{ route('admin.dashboard.profile') }}
                        @else
                        {{ route('profile') }} @endif">Profile</a>
                        </li>
                    </ul>
                </nav><!-- .navbar -->
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input type="submit" value="Logout" class="btn btn-danger">
                </form>
            @endauth

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <h1>@yield('hero_title')</h1>
            <h2>@yield('hero_description')</h2>
            {{-- <a href="#about" class="btn-get-started scrollto">Get Started</a> --}}
        </div>
    </section><!-- End Hero -->
