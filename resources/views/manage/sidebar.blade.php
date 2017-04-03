<aside>
    <div id="sidebar"  class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="{{ request()->is('admin') ? 'active' : '' }}" href="{{ url('admin') }}">
                    <i class="fa fa-tachometer" aria-hidden="true"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a class="{{ request()->is('admin/locations') ? 'active' : '' }}" href="{{ url('admin/locations') }}">
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                    <span>Location</span>
                </a>
            </li>
            <li>
                <a class="{{ request()->is('admin/users') ? 'active' : '' }}" href="{{ url('admin/users') }}">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>Users</span>
                </a>
            </li>
        </ul>
    </div>
</aside>