<nav class="navbar navbar-light bg-white navbar-full navbar-fixed-top ls-left-sidebar">
    <div class="collapse navbar-toggleable-xs" id="navbar">
        <ul class="nav navbar-nav">
            <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/users') }}">Users</a>
            </li>

            <li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/roles') }}">Roles</a>
            </li>
        </ul>

        <ul class="nav navbar-nav pull-xs-right hidden-md-down">
            <li class="nav-item dropdown">
                <a href="javascript:;" class="nav-link active dropdown-toggle p-a-0" data-toggle="dropdown" role="button" aria-haspopup="false">
                    <img src="{{ asset(Auth::user()->getPicture()) }}" alt="Avatar" class="img-circle" width="40">
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-list" aria-labelledby="Preview">
                    <a href="{{ route('users.edit', Auth::user()->id) }}" class="dropdown-item">
                        <i class="material-icons md-18">settings</i>
                        <span class="icon-text">Account</span>
                    </a>
                    <a href="javascript:;" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="material-icons md-18">exit_to_app</i>
                        Logout
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
