    <div class="main-header">
            <div class="logo">
                <img src="{{asset('assets/images/logo.png')}}" alt="">
            </div>

            <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div style="margin: auto"></div>

            <div class="header-part-right">
                <!-- Full screen toggle -->
                <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
                <!-- Grid menu Dropdown -->
                <div class="dropdown">
                    <i class="i-Safe-Box text-muted header-icon" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="menu-icon-grid">
                            <a href="#"><i class="i-Shop-4"></i> Inicio</a>
                            <a href="#"><i class="i-Management"></i> Administracion</a>
                            <a href="#"><i class="i-Gears"></i> Proceso</a>
                            <a href="#"><i class="i-File-Clipboard-File--Text"></i> Reportes</a>
                            <a href="#"><i class="i-Checked-User"></i> Sessions</a>
                            <a href="#"><i class="i-Ambulance"></i> Support</a>
                        </div>
                    </div>
                </div>
                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div  class="user col align-self-end">
                        <div id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="i-Checked-User"></i>
                        </div>
                        <img src="{{asset('assets/images/faces/2.jpg')}}" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">
                                <i class="i-Lock-User mr-1"></i> Usuario
                            </div>
                            <a class="dropdown-item">Account settings</a>
                            <a class="dropdown-item" href="{{route('signIn')}}">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- header top menu end -->
