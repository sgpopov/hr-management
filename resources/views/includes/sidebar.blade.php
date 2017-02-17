<div class="sidebar sidebar-left sidebar-visible-md-up sidebar-size-3 sidebar-dark bg-primary" id="sidebar" data-scrollable>
    <a href="{{ url('/') }}" class="sidebar-brand sidebar-brand-bg sidebar-brand-border m-b-0">
        Dashboard
    </a>

    <ul class="sidebar-menu sm-active-button-bg">
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{{ url('/') }}">
                <i class="sidebar-menu-icon material-icons">home</i>
                Home
            </a>
        </li>
        <li class="sidebar-menu-item open">
            <a class="sidebar-menu-button" href="javascript:;">
                <i class="sidebar-menu-icon material-icons">business</i>
                Organization
            </a>

            <ul class="sidebar-submenu">
                <li class="sidebar-menu-item {{ Request::is('employees*') ? 'active' : '' }}">
                    <a class="sidebar-menu-button" href="{{ route('employees.index') }}">
                        Employees
                    </a>
                </li>
                <li class="sidebar-menu-item {{ Request::is('departments*') ? 'active' : '' }}">
                    <a class="sidebar-menu-button" href="{{ route('departments.index') }}">
                        Departments
                    </a>
                </li>
                <li class="sidebar-menu-item {{ Request::is('teams*') ? 'active' : '' }}">
                    <a class="sidebar-menu-button" href="{{ route('teams.index') }}">
                        Teams
                    </a>
                </li>
            </ul>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="javascript:;">
                <i class="sidebar-menu-icon material-icons">description</i>
                Documents
            </a>

            <ul class="sidebar-submenu">
                <li class="sidebar-menu-item {{ Request::is('employees*') ? 'active' : '' }}">
                    <a class="sidebar-menu-button" href="{{ route('employees.index') }}">
                        Filled documents
                    </a>
                </li>
                <li class="sidebar-menu-item {{ Request::is('departments*') ? 'active' : '' }}">
                    <a class="sidebar-menu-button" href="{{ route('departments.index') }}">
                        Templates
                    </a>
                </li>
                <li class="sidebar-menu-item {{ Request::is('teams*') ? 'active' : '' }}">
                    <a class="sidebar-menu-button" href="{{ route('teams.index') }}">
                        Keywords
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
