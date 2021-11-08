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
                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div  class="user col align-self-end">
                        <div id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="i-Checked-User header-icon"></i>
                        </div>
                        <!-- <img src="{{asset('assets/images/faces/2.jpg')}}" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">
                                <i class="i-Lock-User mr-1"></i> Usuario
                            </div>
                            <a class="dropdown-item" href="{{ route('logout') }}">Salir</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- header top menu end -->
