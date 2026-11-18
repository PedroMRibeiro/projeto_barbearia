
<div class="sidebar-wrapper" style="overflow: hidden;">
    <style>
        .nav li:last-child a:hover i,
        .nav li:last-child a:hover p {
            color: red !important;
        }
    </style>
    <ul class="nav">
        <li class="{{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}">
                <i class="nc-icon nc-globe"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="{{ Route::currentRouteName() == 'profile.edit' ? 'active' : '' }}">
            <a href="{{ route('profile.edit') }}">
                <i class="nc-icon nc-badge"></i>
                <p>Perfil</p>
            </a>
        </li>
        <li class="{{ Route::currentRouteName() == 'users.index' ? 'active' : '' }}">
            <a href="{{ route('users.index') }}">
                <i class="nc-icon nc-single-02"></i>
                <p>Utilizadores</p>
            </a>
        </li>
        <li class="{{ Route::currentRouteName() == 'services.index' ? 'active' : '' }}">
            <a href="{{ route('services.index') }}">
            <i class="nc-icon nc-money-coins"></i>
            <p>Serviços</p>
            </a>
        </li>
        <li class="{{ Route::currentRouteName() == 'barbers.index' ? 'active' : '' }}">
            <a href="{{ route('barbers.index') }}">
            <i class="nc-icon nc-scissors"></i>
            <p>Barbeiros</p>
            </a>
        </li>
        <li class="{{ Route::currentRouteName() == 'appointments.index' ? 'active' : '' }}">
            <a href="{{ route('appointments.index') }}">
            <i class="nc-icon nc-calendar-60"></i>
            <p>Agenda</p>
            </a>
        </li>
        <li class="{{ Route::currentRouteName() == 'availabilities.index' ? 'active' : '' }}">
            <a href="{{ route('availabilities.index') }}">
            <i class="nc-icon nc-check-2"></i>
            <p>Disponibilidades</p>
            </a>
        </li>
        <li class="active-pro">
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="nc-icon nc-button-power"></i>
                <p>Logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>