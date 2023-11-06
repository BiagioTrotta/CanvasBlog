<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><img width="120" src="{{ Storage::url("public/images/media/logo_canvas_blog.png") }}" alt="{{ config('app.name') }}"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav text-center">
                @foreach($nav as $key => $navitem)
                <a class="nav-link fs-4 @if($loop->first)active @endif" href="{{$key}}">{{$navitem}}</a>
                @endforeach
            </div>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fs-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Api
                </a>
                <ul class="dropdown-menu">
                @foreach($nav2 as $key => $navitem)
                <li><a class="dropdown-item" href="{{$key}}">{{$navitem}}</a></li>
                    @if (!$loop->last)
                    <li><hr class="dropdown-divider"></li>
                    @endif
                @endforeach
            </ul>
            </ul>
            <div class="navbar-nav ms-auto text-center">
                @guest
                <li class="nav-item dropdown me-lg-4">
                    <a class="nav-link dropdown-toggle me-lg-4 fs-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-gear fs-5"></i> Settings
                    </a>
                    <ul class="dropdown-menu text-center text-lg-start w-25 mx-auto">
                        <li><a class="dropdown-item" href="/login"><i class="fa-solid fa-user"></i> Login</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/register"><i class="fa-solid fa-user-plus"></i> Register</a></li>
                    </ul>
                </li>
                @endguest
                @auth
                <li class="nav-item dropdown me-lg-4">
                    <a class="nav-link dropdown-toggle me-lg-4 fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-gear fs-5"></i> {{$user = Auth::user()->name ?? ''}}
                    </a>
                    <ul class="dropdown-menu text-center text-lg-start w-25 mx-auto">
                        <li>
                            <form class="dropdown-item" action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="btn w-100"><i class="fa-solid fa-lock-open"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth
            </div>
        </div>
    </div>
</nav>