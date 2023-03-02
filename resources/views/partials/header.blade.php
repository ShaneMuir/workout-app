<header class="border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between py-3">

            <!-- site logo -->
            <a href="{{ url('/') }}" class="d-flex align-items-center text-dark text-decoration-none">
                <img class="bi me-2" width="40" height="40" aria-label="logo-img" src="{{ asset('assets/logo.svg') }}" alt="logo-img">
            </a>
            <!-- ./site logo -->

            <!-- profile sidebar -->
            <a href data-bs-toggle="offcanvas" data-bs-target="#profileSidebar" aria-controls="profileSidebar" class="d-flex align-items-center text-dark text-decoration-none">
                @if( auth()->user() )
                <img src="{{ $user->getAvatarUrl() }}" alt="User Avatar" width="40" height="40" class="rounded-circle">
                @else
                <img src="{{ asset('assets/hacker.png') }}" alt="mdo" width="40" height="40" class="rounded-circle">
                @endif
            </a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="profileSidebar" aria-labelledby="profileSidebar">
                <div class="offcanvas-header justify-content-end">
                    <button type="button" class="btn-close fs-4" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="nav flex-column">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="d-grid btn btn-outline-primary mb-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="d-grid btn btn-outline-primary mb-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

                        @else

                            @if(Route::has('profile'))
                            <li class="nav-item">
                                <a class="d-grid btn btn-outline-primary mb-2" href="{{ route('profile') }}">{{ __('Profile') }}</a>
                            </li>
                            @endif

                            <li class="nav-item">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="d-grid btn btn-outline-primary mb-2 w-100" type="submit">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        @endguest
                    </ul>


                </div>
            </div>
            <!-- ./profile sidebar -->

        </div>
    </div>
</header>
