<header class="main-header">
    <a href="{{url('')}}" class="logo">
        <span class="logo-mini"><img class="img-rounded" src="{{ asset('sitephoto.jpg') }}" style="width:75%" alt=""></span>
        <span class="logo-lg"><img class="img-rounded" src="{{ asset('sitephoto.jpg') }}" style="width:15%" alt=""><b>Where</b> 2 Go</span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li><a href="{{url('profile')}}"><i class="fa fa-fw fa-user"></i>Profile</a></li>
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