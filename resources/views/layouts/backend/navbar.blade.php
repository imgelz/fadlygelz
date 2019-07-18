<nav class="top-toolbar navbar navbar-desktop flex-nowrap">
    
 
    <!-- START RIGHT TOOLBAR ICON MENUS -->
    <ul class="navbar-nav nav-right">
        <li class="nav-item dropdown">
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="{{asset('backend/assets/img/avatars/gelz.jpg')}}" class="w-35 rounded-circle" alt="{{Auth::user()->name}}">
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-accout">
                <div class="dropdown-header pb-3">
                    <div class="media d-user">
                    <img class="align-self-center mr-3 w-40 rounded-circle" src="{{asset('backend/assets/img/avatars/gelz.jpg')}}" alt="{{Auth::user()->name}}">
                        <div class="media-body">
                    <h5 class="mt-0 mb-0">{{Auth::user()->name}}</h5>
                            <span>{{Auth::user()->email}}</span>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="icon dripicons-lock"></i> Lock Account</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
            </div>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0)" data-toggle-state="aside-right-open">
                <i class="icon dripicons-align-right"></i>
            </a>
        </li>
    </ul>
    <!-- END RIGHT TOOLBAR ICON MENUS -->
    <!--START TOP TOOLBAR SEARCH -->
    <form role="search" action="http://www.authenticgoods.co/themes/quantum-pro/demos/demo3/pages.search.html" class="navbar-form">
        <div class="form-group">
            <input type="text" placeholder="Search and press enter..." class="form-control navbar-search" autocomplete="off">
            <i data-q-action="close-site-search" class="icon dripicons-cross close-search"></i>
        </div>
        <button type="submit" class="d-none">Submit</button>
    </form>
    <!--END TOP TOOLBAR SEARCH -->
</nav>