<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark justify-content-between">
    <a class="navbar-brand" href="#">Human Resources</a>

    <div>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/users') }}">Users</a>
            </li>
            <li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/roles') }}">Roles</a>
            </li>
        </ul>
    </div>
</nav>
