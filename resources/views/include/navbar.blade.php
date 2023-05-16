<nav class="navbar navbar-expand-lg px-5 py-3 mx-auto">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset("Logo.png") }}" alt="logo" height="40" />
        </a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav text-dark fw-semibold lh-md">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('cars') }}">
                        Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('about') }}">
                        About Us
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        Help center
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="#">Contact Us</a>
                        </li>
                        <li><a class="dropdown-item" href="#">FAQ</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto text-dark fw-semibold lh-md">
                @guest
                @if(Route::has("register"))
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            aria-current="page"
                            href="{{ route("register") }}"
                        >
                            {{ __("Register") }}
                        </a>
                    </li>
                @endif

                @if(Route::has("login"))
                    <li class="nav-item">
                        <a
                            class="nav-link btn btn-lg btn-success text-light rounded-5 px-4"
                            aria-current="page"
                            href="{{ route("login") }}"
                        >
                            {{ __("Login") }}
                            <b class="bi bi-box-arrow-in-right"></b>
                        </a>
                    </li>
                @endif
                 @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('pesanan') }}"><i class="bi bi-bell"></i> Pesanan Saya</a>
                            @if (auth()->user()->role != "user")
                                <a class="dropdown-item" href="{{ route('dashboard') }}"><i class="bi bi-grid"></i> Dashboard</a>
                            @endif
                            
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-left"></i> {{ __('Logout') }}
                            </a>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
