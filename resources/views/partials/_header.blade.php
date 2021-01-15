<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">


            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="/">
                 {{-- @lang('header.appName') --}}
                 {{ __('header.appName')}}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav ">
                    <li><a href="/lang/ar">Arabic</a></li>
                    <li><a href="/lang/en">English</a></li>
            </ul>


            @guest

            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                <li><a href="/login">{{__('header.login')}}</a></li>
                <li><a href="/register">{{__('header.register')}}</a></li>
            </ul>

            @else
             <!-- Right Side Of Navbar -->
             <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{Auth::user()->email}} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="logout" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>

                @endguest
        </div>
    </div>
</nav>
