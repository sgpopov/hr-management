<nav class="col-sm-3 col-md-2 d-none d-sm-block sidebar">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                <i class="sidebar-menu-icon material-icons">dashboard</i>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('employees.index') }}" class="nav-link {{ Request::is('employees*') ? 'active' : '' }}">
                <i class="sidebar-menu-icon material-icons">people</i>
                Employees
            </a>
        </li>
    </ul>

    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-inactive">
                Organization
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('departments.index') }}" class="nav-link {{ Request::is('departments*') ? 'active' : '' }}">
                <i class="sidebar-menu-icon material-icons">business</i>
                Departments
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('teams.index') }}" class="nav-link {{ Request::is('teams*') ? 'active' : '' }}">
                <i class="sidebar-menu-icon material-icons">business</i>
                Teams
            </a>
        </li>
    </ul>

    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-inactive">
                Documents
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="sidebar-menu-icon material-icons">assignment_turned_in</i>
                Filled documents
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('documentTemplates.index') }}" class="nav-link {{ Request::is('documents/templates*') ? 'active' : '' }}">
                <i class="sidebar-menu-icon material-icons">description</i>
                Templates
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="sidebar-menu-icon material-icons">format_color_text</i>
                Keywords
            </a>
        </li>
    </ul>
</nav>
