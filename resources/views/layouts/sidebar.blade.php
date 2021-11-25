<div class="side-content-wrap">
    <div class="sidebar-left open" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
        <li class="nav-item {{ request()->is('dashboard/*') ? 'active' : '' }}" data-item="dashboard">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Inicio</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ request()->is('administration/*') ? 'active' : '' }}" data-item="administration">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-File-Clipboard-File--Text"></i>
                    <span class="nav-text">Registros</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ request()->is('process/*') ? 'active' : '' }}" data-item="process">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Farmer"></i>
                    <span class="nav-text">Control</span>
                </a>
                <div class="triangle"></div>
            </li>

        </ul>
    </div>

    <div class="sidebar-left-secondary" data-perfect-scrollbar data-suppress-scroll-x="true">
        <!-- Submenu Dashboards -->
        <ul class="childNav" data-parent="dashboard">
            <li class="nav-item ">
                <a class="{{ Route::currentRouteName()=='home' ? 'open' : '' }}" href="{{route('home')}}">
                    <span class="item-name">Inicio</span>
                </a>
            </li>
        </ul>
        <ul class="childNav" data-parent="administration">
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='toros.index' ? 'open' : '' }}" href="{{route('toros.index')}}">
                    <span class="item-name">Toros</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='Vacas.index' ? 'open' : '' }}" href="{{route('Vacas.index')}}">
                    <span class="item-name">Vacas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='becerros.index' ? 'open' : '' }}" href="{{route('becerros.index')}}">
                    <span class="item-name">Becerros</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='becerras.index' ? 'open' : '' }}" href="{{route('becerras.index')}}">
                    <span class="item-name">Becerras</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='nobillas.index' ? 'open' : '' }}" href="{{route('nobillas.index')}}">
                    <span class="item-name">Novillas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='toretes.index' ? 'open' : '' }}" href="{{route('toretes.index')}}">
                    <span class="item-name">Toretes</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='mautas.index' ? 'open' : '' }}" href="{{route('mautas.index')}}">
                    <span class="item-name">Mautas</span>
                </a>
            </li>
        </ul>
        <ul class="childNav" data-parent="process">
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='type_user.index' ? 'open' : '' }}" href="{{route('type_user.index')}}">
                    <span class="item-name">Usuarios</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='type_user.index' ? 'open' : '' }}" href="{{route('type_user.index')}}">
                    <span class="item-name">Tipos de Usuarios</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='Tipo_Animal.index' ? 'open' : '' }}" href="{{route('Tipo_Animal.index')}}">
                    <span class="item-name">Tipo de Animal</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='finca.index' ? 'open' : '' }}" href="{{route('finca.index')}}">
                    <span class="item-name">Finca</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='gestacion.index' ? 'open' : '' }}" href="{{route('gestacion.index')}}">
                    <span class="item-name">Gestacion</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='sanidad.index' ? 'open' : '' }}" href="{{route('sanidad.index')}}">
                    <span class="item-name">Sanidad</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-overlay"></div>
</div>
<!--=============== Left side End ================-->
