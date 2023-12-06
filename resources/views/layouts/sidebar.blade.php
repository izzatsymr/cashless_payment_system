<div class="nk-sidebar nk-sidebar-fixed is-theme" id="sidebar">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="./html/index.html" class="logo-link">
                <div class="logo-wrap">
                    <img class="logo-img logo-light" src="{{ asset('images/logo.png') }}"
                        srcset="{{ asset('images/logo2x.png') }} 2x" alt="">
                    <img class="logo-img logo-dark" src="{{ asset('images/logo-dark.png') }}"
                        srcset="{{ asset('images/logo-dark2x.png') }} 2x" alt="">
                    <img class="logo-img logo-icon" src="{{ asset('images/logo-icon.png') }}"
                        srcset="{{ asset('images/logo-icon2x.png') }} 2x" alt="">
                </div>
            </a>
            <div class="nk-compact-toggle me-n1">
                <button class="btn btn-md btn-icon text-light btn-no-hover compact-toggle">
                    <em class="icon off ni ni-chevrons-left"></em>
                    <em class="icon on ni ni-chevrons-right"></em>
                </button>
            </div>
            <div class="nk-sidebar-toggle me-n1">
                <button class="btn btn-md btn-icon text-light btn-no-hover sidebar-toggle">
                    <em class="icon ni ni-arrow-left"></em>
                </button>
            </div>
        </div><!-- end nk-sidebar-brand -->
    </div><!-- end nk-sidebar-element -->
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    @auth
                    <li class="nk-menu-item">
                        <a href="{{ route('home') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nk-menu-heading">
                        <h6 class="overline-title">Applications</h6>
                    </li>
                    @can('view-any', App\Models\User::class)
                    <li class="nk-menu-item">
                        <a href="{{ route('users.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                            <span class="nk-menu-text">Users</span>
                        </a>
                    </li>
                    @endcan
                    @can('view-any', App\Models\Student::class)
                    <li class="nk-menu-item">
                        <a href="{{ route('students.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-happy"></em></span>
                            <span class="nk-menu-text">Students</span>
                        </a>
                    </li>
                    @endcan
                    @can('view-any', App\Models\Card::class)
                    <li class="nk-menu-item">
                        <a href="{{ route('cards.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-cards"></em></span>
                            <span class="nk-menu-text">Cards</span>
                        </a>
                    </li>
                    @endcan
                    @can('view-any', App\Models\Scanner::class)
                    <li class="nk-menu-item">
                        <a href="{{ route('scanners.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                            <span class="nk-menu-text">Devices</span>
                        </a>
                    </li>
                    @endcan
                    <li class="nk-menu-item">
                        <a href="{{ route('pricing.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-sign-usd"></em></span>
                            <span class="nk-menu-text">Pricing</span>
                        </a>
                    </li>
                    @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                    Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                    <li class="nk-menu-heading">
                        <h6 class="overline-title">User Management</h6>
                    </li>
                    @can('view-any', Spatie\Permission\Models\Role::class)
                    <li class="nk-menu-item">
                        <a href="{{ route('roles.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-account-setting-fill"></em></span>
                            <span class="nk-menu-text">Roles</span>
                        </a>
                    </li>
                    @endcan
                    @can('view-any', Spatie\Permission\Models\Permission::class)
                    <li class="nk-menu-item">
                        <a href="{{ route('permissions.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-shield-check"></em></span>
                            <span class="nk-menu-text">Permissions</span>
                        </a>
                    </li>
                    @endcan
                    @endif
                    @endauth
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div><!-- .nki-sidebar -->
<!-- sidebar @e -->