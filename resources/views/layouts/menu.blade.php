<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/dashboard" id="topnav-dashboard" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard me-1"></i> DASHBOARD
                        </a>

                    </li>
                    @can('manage_property')
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/property" id="topnav-dashboard" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-domain me-1"></i> PROPERTY
                        </a>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/units" id="topnav-dashboard" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-home-plus me-1"></i> UNITS
                        </a>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/tenants" id="topnav-dashboard" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-account-group me-1"></i> TENANTS
                        </a>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/tenancy-payments" id="topnav-dashboard" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-cash-multiple me-1"></i> PAYMENTS
                        </a>

                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/users" id="topnav-dashboard" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-account-multiple-plus me-1"></i> USERS
                        </a>

                    </li>

                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/artisans" id="topnav-dashboard" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-account-cog me-1"></i> ARTISANS
                        </a>

                    </li> -->
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/chatbox" id="topnav-dashboard" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard me-1"></i> CHATS
                        </a>

                    </li> -->



                    <li class="nav-item dropdown  " id="clockdiv">
                        <a class="nav-link arrow-none" href="#" id="topnav-dashboard" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            SUBSCRIPTION:
                            <b class="text-black text-lg">
                            <span id="countdown-timer" ></span>
                            </b>
                        </a>
                    </li>
                    @endcan

                    @can('super_admin')
                     <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/settings" id="topnav-dashboard" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-cogs me-1"></i> SETTINGS
                        </a>

                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/bsdash" id="topnav-dashboard" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-cogs me-1"></i> B2S Dash
                        </a>

                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/bsuserdash" id="topnav-dashboard" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-cogs me-1"></i> B2S UserDash
                        </a>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/bsuserdash" id="topnav-dashboard" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-cogs me-1"></i> Lanbanking Dash
                        </a>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/bsuserdash" id="topnav-dashboard" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-cogs me-1"></i> Landbanking UserDash
                        </a>

                    </li>
                    @endcan

                </ul>  <!-- end navbar-->
            </div> <!-- end .collapsed-->
        </nav>
    </div> <!-- end container-fluid -->
</div>
