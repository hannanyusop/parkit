<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">ADMIN PANEL</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">AP</a>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a class="nav-link {{ (Route::is('admin.dashboard')? 'active' : '') }}" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            @if ( $logged_in_user->hasAllAccess() || (
                $logged_in_user->can('admin.access.user.list') ||
                $logged_in_user->can('admin.access.user.deactivate') ||
                $logged_in_user->can('admin.access.user.reactivate') ||
                $logged_in_user->can('admin.access.user.clear-session') ||
                $logged_in_user->can('admin.access.user.impersonate') ||
                $logged_in_user->can('admin.access.user.change-password')
            ))
            <li class="menu-header">System</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'c-open c-show') }}"><i class="fas fa-user"></i><span>User & Role</span></a>
                <ul class="dropdown-menu">
                    @if ($logged_in_user->hasAllAccess() ||(
                            $logged_in_user->can('admin.access.user.list') ||
                            $logged_in_user->can('admin.access.user.deactivate') ||
                            $logged_in_user->can('admin.access.user.reactivate') ||
                            $logged_in_user->can('admin.access.user.clear-session') ||
                            $logged_in_user->can('admin.access.user.impersonate') ||
                            $logged_in_user->can('admin.access.user.change-password')
                        )
                    )
                        <li><a class="nav-link {{ activeClass(Route::is('admin.auth.user.*'), 'c-active') }}" href="{{ route('admin.auth.user.index') }}">User Management</a></li>
                    @endif
                        @if ($logged_in_user->hasAllAccess())
                            <li><a class="nav-link {{ activeClass(Route::is('admin.auth.role.*'), 'c-active') }}" href="{{ route('admin.auth.role.index') }}">{{ __('Role Management') }}</a></li>
                        @endif

                </ul>
            </li>
            @endif
            <li>
                <a class="nav-link {{ (Route::is('admin.student.index')? 'active' : '') }}" href="{{ route('admin.student.index') }}">
                    <i class="fas fa-users"></i> <span>Student</span>
                </a>
            </li>
            @if ($logged_in_user->hasAllAccess())
                <li class="menu-header">Logs</li>

                <li>
                    <a class="nav-link" href="/admin/log-viewer">
                        <i class="fas fa-pencil-ruler"></i> <span>{{ __('Logs') }}</span>
                    </a>
                </li>
            @endif
        </ul>


    </aside>
</div>
