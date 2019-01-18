<div class="container">
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                <h1><strong>{{config("app.name")}}</strong></h1>
            </a>

            <div class="navbar-burger burger" data-target="nav-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div id="nav-menu" class="navbar-menu">
            <div class="navbar-start">
                @guest
                @else
                    <a class="navbar-item is-hoverable" href="/approvals/create">Create new approval</a>
                @endguest
            </div>

            <div class="navbar-end">
                @guest
                    <a class="navbar-item is-hoverable" href="{{route("login")}}">Login</a>
                    <a class="navbar-item is-hoverable" href="{{route("register")}}">Register</a>
                @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link" href="#">{{Auth::user()->name}}</a>
                        <div class="navbar-dropdown is-boxed">
                            <a class="navbar-item" href="/dashboard">Dashboard</a>
                            <a class="navbar-item" href="{{route("logout")}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            {{Form::open(["route" => "logout", "method" => "POST", "id" => "logout-form", "style" => "display: none;"])}}
                            {{Form::close()}}
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </nav>
</div>