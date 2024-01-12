<header class="main-header">
    <a href="/dashboard" class="logo">
        <span class="logo-mini"><b>BPR</b></span>
        <span class="logo-lg"><b>TOOLKIT</b></span>
    </a>

    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('favicon.png') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ asset('favicon.png') }}" class="img-circle" alt="User Image">
                            <p>
                                <font style="text-transform: uppercase;">{{ Auth::user()->username }}</font>
                                <small>{{ Auth::user()->email }}</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-success btn-flat">Password</a>
                            </div>
                            <div class="pull-right">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="" class="btn btn-default btn-flat"
                                        onclick="event.preventDefault(); this.closest('form').submit();">Keluar</a>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
