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
                <a class="{{ Route::currentRouteName()=='dashboard_version_1' ? 'open' : '' }}" href="{{route('dashboard_version_1')}}">
                    <i class="nav-icon i-Clock-3"></i>
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
                <a class="{{ Route::currentRouteName()=='invoice' ? 'open' : '' }}" href="{{route('invoice')}}">
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
        <ul class="childNav" data-parent="reports">
            <i class="nav-icon i-Crop-2"></i>
            <i class="nav-icon i-Loading-3"></i>
                
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='toastr' ? 'open' : '' }}" href="{{route('toastr')}}">
                    <i class="nav-icon i-Bell"></i>
                    <span class="item-name">Toastr</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='sweetAlert' ? 'open' : '' }}" href="{{route('sweetAlert')}}">
                    <i class="nav-icon i-Approved-Window"></i>
                    <span class="item-name">Sweet Alerts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='tour' ? 'open' : '' }}" href="{{route('tour')}}">
                    <i class="nav-icon i-Plane"></i>
                    <span class="item-name">User Tour</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='upload' ? 'open' : '' }}" href="{{route('upload')}}">
                    <i class="nav-icon i-Data-Upload"></i>
                    <span class="item-name">Upload</span>
                </a>
            </li>
        </ul>
        <ul class="childNav" data-parent="uikits">
            <li class="nav-item">
            <a class="{{ Route::currentRouteName()=='alerts' ? 'open' : '' }}" href="{{route('alerts')}}">
                    <i class="nav-icon i-Bell1"></i>
                    <span class="item-name">Alerts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='accordion' ? 'open' : '' }}" href="{{route('accordion')}}">
                    <i class="nav-icon i-Split-Horizontal-2-Window"></i>
                    <span class="item-name">Accordion</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='badges' ? 'open' : '' }}" href="{{route('badges')}}">
                    <i class="nav-icon i-Medal-2"></i>
                    <span class="item-name">Badges</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='buttons' ? 'open' : '' }}" href="{{route('buttons')}}">
                    <i class="nav-icon i-Cursor-Click"></i>
                    <span class="item-name">Buttons</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='cards' ? 'open' : '' }}" href="{{route('cards')}}">
                    <i class="nav-icon i-Line-Chart-2"></i>
                    <span class="item-name">Cards</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='cards-metrics' ? 'open' : '' }}" href="{{route('cards-metrics')}}">
                    <i class="nav-icon i-ID-Card"></i>
                    <span class="item-name">Card Metrics</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='carousel' ? 'open' : '' }}" href="{{route('carousel')}}">
                    <i class="nav-icon i-Video-Photographer"></i>
                    <span class="item-name">Carousels</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='lists' ? 'open' : '' }}" href="{{route('lists')}}">
                    <i class="nav-icon i-Belt-3"></i>
                    <span class="item-name">Lists</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='pagination' ? 'open' : '' }}" href="{{route('pagination')}}">
                    <i class="nav-icon i-Arrow-Next"></i>
                    <span class="item-name">Paginations</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='popover' ? 'open' : '' }}" href="{{route('popover')}}">
                    <i class="nav-icon i-Speach-Bubble-2"></i>
                    <span class="item-name">Popover</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='progressbar' ? 'open' : '' }}" href="{{route('progressbar')}}">
                    <i class="nav-icon i-Loading"></i>
                    <span class="item-name">Progressbar</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='tables' ? 'open' : '' }}" href="{{route('tables')}}">
                    <i class="nav-icon i-File-Horizontal-Text"></i>
                    <span class="item-name">Tables</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='tabs' ? 'open' : '' }}" href="{{route('tabs')}}">
                    <i class="nav-icon i-New-Tab"></i>
                    <span class="item-name">Tabs</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='tooltip' ? 'open' : '' }}" href="{{route('tooltip')}}">
                    <i class="nav-icon i-Speach-Bubble-8"></i>
                    <span class="item-name">Tooltip</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='modals' ? 'open' : '' }}" href="{{route('modals')}}">
                    <i class="nav-icon i-Duplicate-Window"></i>
                    <span class="item-name">Modals</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='NoUislider' ? 'open' : '' }}" href="{{route('NoUislider')}}">
                    <i class="nav-icon i-Width-Window"></i>
                    <span class="item-name">Sliders</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-overlay"></div>
</div>
<!--=============== Left side End ================-->
