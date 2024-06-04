<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset("admin_lte_3.2.0/dist/img/AdminLTELogo.png") }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">CITY EDUCATION</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @can('home-index')
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ Request::is('home*') ? "active":'' }}">
                            <i class="fa fa-home"></i>
                            <p>Home</p>
                        </a>
                    </li>
                @endcan

                @can('attendance-index')
                    <li class="nav-item">
                        <a href="{{ route('attendance.index') }}"
                           class="nav-link {{ Request::is('attendance*') ? "active":'' }}">
                            <i class="fa fa-list-ol"></i>
                            <p>Attendance</p>
                        </a>
                    </li>
                @endcan

                @can('attendance-noattend')
                    <li class="nav-item">
                        <a href="{{ route('attend.noattend') }}"
                           class="nav-link {{ Request::is('attend/noattend') ? "active":'' }}">
                            <i class="fa fa-window-close"></i>
                            <p>No Attend</p>
                        </a>
                    </li>
                @endcan

                @can('group-index')
                    <li class="nav-item">
                        <a href="{{ route('group.index') }}" class="nav-link {{ Request::is('group*') ? "active":'' }}">
                            <i class="fa fa-layer-group"></i>
                            <p>Groups</p>
                        </a>
                    </li>
                @endcan

                @can('student-index')
                    <li class="nav-item">
                        <a href="{{ route('student.index') }}"
                           class="nav-link {{ Request::is('student*') ? "active":'' }}">
                            <i class="fa fa-user-graduate"></i>
                            <p>Students</p>
                        </a>
                    </li>
                @endcan

                @can('staff-index')
                    <li class="nav-item">
                        <a href="{{ route('staff.index') }}" class="nav-link {{ Request::is('staff*') ? "active":'' }}">
                            <i class="fa fa-book-reader"></i>
                            <p>Staff</p>
                        </a>
                    </li>
                @endcan

                @canany(['role-index','user-index','room-index'])
                    <li class="nav-item {{ (Request::is('roles*') or Request::is('permissions*') or Request::is('filial*') or Request::is('room*') or Request::is('cource*') or Request::is('direction*') or Request::is('lang*') or Request::is('day*')) ? 'menu-open' : '' }}">
                        <a href="#"
                           class="nav-link {{ (Request::is('roles*') or Request::is('permissions*') or Request::is('filial*') or Request::is('room*') or Request::is('cource*') or Request::is('direction*') or Request::is('lang*') or Request::is('day*')) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-cog"></i>
                            <p>
                                Settings
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('filial-index')
                                <li class="nav-item">
                                    <a href="{{ route('filial.index') }}"
                                       class="nav-link {{ Request::is('filial*') ? "active":'' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Filials</p>
                                    </a>
                                </li>
                            @endcan

                            @can('room-index')
                                <li class="nav-item">
                                    <a href="{{ route('room.index') }}"
                                       class="nav-link {{ Request::is('room*') ? "active":'' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Rooms</p>
                                    </a>
                                </li>
                            @endcan

                            @can('cource-index')
                                <li class="nav-item">
                                    <a href="{{ route('cource.index') }}"
                                       class="nav-link {{ Request::is('cource*') ? "active":'' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Cources</p>
                                    </a>
                                </li>
                            @endcan

                            @can('direction-index')
                                <li class="nav-item">
                                    <a href="{{ route('direction.index') }}"
                                       class="nav-link {{ Request::is('direction*') ? "active":'' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Directions</p>
                                    </a>
                                </li>
                            @endcan

                            @can('lang-index')
                                <li class="nav-item">
                                    <a href="{{ route('lang.index') }}"
                                       class="nav-link {{ Request::is('lang*') ? "active":'' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Langs</p>
                                    </a>
                                </li>
                            @endcan

                            @can('day-index')
                                <li class="nav-item">
                                    <a href="{{ route('day.index') }}"
                                       class="nav-link {{ Request::is('day*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Days</p>
                                    </a>
                                </li>
                            @endcan

                            @can('role-index')
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}"
                                       class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
