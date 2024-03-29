<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">


        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="assets/images/users/avatar-4.jpg" alt="user-image" class="rounded-circle">
                <span class="pro-user-name ml-1">
                    {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }} <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h6 class="m-0">
                        Bienvenue !
                    </h6>
                </div>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="dripicons-user"></i>
                    <span>Mon compte</span>
                </a>

                <!-- item-->
                {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="dripicons-gear"></i>
                    <span>Settings</span>
                </a> --}}

                <!-- item-->
                {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="dripicons-help"></i>
                    <span>Support</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="dripicons-lock"></i>
                    <span>Lock Screen</span>
                </a> --}}

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="{{ route('logout') }}" class="dropdown-item notify-item">
                    <i class="dripicons-power"></i>
                    <span>Déconnexion</span>
                </a>

            </div>
        </li>

    </ul>

    <ul class="list-unstyled menu-left mb-0">
        <li class="float-left">
            <a href="index.html" class="logo">
                <span class="logo-lg">
                    <img src="assets/images/srhfirstlog2.png" alt="" height="68">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/srhfirstlog3.png" alt="" height="30">
                </span>
            </a>
        </li>
        <li class="float-left">
            <a class="button-menu-mobile navbar-toggle">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>
        </li>
        {{-- <li class="app-search d-none d-md-block">
            <form>
                <input type="text" placeholder="Search..." class="form-control">
                <button type="submit" class="sr-only"></button>
            </form>
        </li> --}}
    </ul>
</div>
