<header class="main-header">
        <!-- Logo -->
    <a href="{{url('')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img class="img-rounded" src="{{ asset('sitephoto.jpg') }}" style="width:75%" alt=""></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img class="img-rounded" src="{{ asset('sitephoto.jpg') }}" style="width:15%" alt=""><b>Where</b> 2 Go</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <li>
                    <a href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    >
                        <i class="fa fa-fw fa-power-off"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</header>