<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('home') }}">
                        <i class="dripicons-meter"></i>
                        <span> Dashboard </span>
                    </a>
                    <a href="#">
                        <i class="icon-chart"></i>
                        <span> Transactions </span>
                    </a>
                </li>

                <li class="menu-title">Configuration</li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="icon-settings"></i>
                        <span> Paramètres </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('users.index') }}">Utilisateurs</a>
                        </li>
                        <li>
                            <a href="#">Rôles</a>
                        </li>
                        <li>
                            <a href="#">Permissions</a>
                        </li>
                    </ul>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
