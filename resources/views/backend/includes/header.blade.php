<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ $logged_in_user->avatar }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ $logged_in_user->name ?? '' }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">
                    @if($logged_in_user->last_login_at)
                        Logged in @displayDate($logged_in_user->last_login_at)
                    @else
                        @lang('N/A')
                    @endif
                </div>
                <div class="dropdown-divider"></div>

                    <x-utils.link
                        class="dropdown-item has-icon text-danger"
                        icon="fas fa-sign-out-alt"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <x-slot name="text">
                            @lang('Logout')
                            <x-forms.get :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                        </x-slot>
                    </x-utils.link>
            </div>
        </li>
    </ul>
</nav>
