<!-- include Header  -->
<div class="nk-header nk-header-fixed">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-header-logo ms-n1">
                <div class="nk-sidebar-toggle">
                    <button class="btn btn-sm btn-icon btn-zoom sidebar-toggle d-sm-none"><em
                            class="icon ni ni-menu"></em></button>
                    <button class="btn btn-md btn-icon btn-zoom sidebar-toggle d-none d-sm-inline-flex"><em
                            class="icon ni ni-menu"></em></button>
                </div>
                <div class="nk-navbar-toggle me-2">
                    <button class="btn btn-sm btn-icon btn-zoom navbar-toggle d-sm-none"><em
                            class="icon ni ni-menu-right"></em></button>
                    <button class="btn btn-md btn-icon btn-zoom navbar-toggle d-none d-sm-inline-flex"><em
                            class="icon ni ni-menu-right"></em></button>
                </div>
                <a href="{{ route('home') }}" class="logo-link">
                    <div class="logo-wrap">
                        <img class="logo-img logo-light" src="{{ asset('images/logo.png') }}"
                            srcset="{{ asset('images/logo2x.png') }} 2x" alt="">
                        <img class="logo-img logo-dark" src="{{ asset('images/logo-dark.png') }}"
                            srcset="{{ asset('images/logo-dark2x.png') }} 2x" alt="">
                        <img class="logo-img logo-icon" src="{{ asset('images/logo-icon.png') }}"
                            srcset="{{ asset('images/logo-icon2x.png') }} 2x" alt="">
                    </div>
                </a>
            </div>
            <nav class="nk-header-menu nk-navbar">
                <ul class="nk-nav">
                    <!-- Add your navigation items here -->
                </ul>
            </nav>
            <div class="nk-header-tools">
                <ul class="nk-quick-nav ms-2">
                    <li class="dropdown">
                        <a href="#" data-bs-toggle="dropdown">
                            <div class="d-sm-none">
                                <div class="media media-md media-circle">
                                    <img src="{{ asset('images/avatar/a.jpg') }}" alt="" class="img-thumbnail">
                                </div>
                            </div>
                            <div class="d-none d-sm-block">
                                <div class="media media-circle">
                                    <img src="{{ asset('images/avatar/a.jpg') }}" alt="" class="img-thumbnail">
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md">
                            <div class="dropdown-content dropdown-content-x-lg py-3 border-bottom border-light">
                                <div class="media-group">
                                    <div class="media media-xl media-middle media-circle">
                                        <img src="{{ asset('images/avatar/a.jpg') }}" alt="" class="img-thumbnail">
                                    </div>
                                    <div class="media-text">
                                        <div class="lead-text">{{ auth()->user()->name ?? '-' }}</div>
                                        <span class="sub-text">
                                            @foreach(auth()->user()->roles as $role)
                                            {{ $role->name }}
                                            @endforeach
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-content dropdown-content-x-lg py-3 border-bottom border-light">
                                <ul class="link-list">
                                    <li><a href="{{ route('users.show', auth()->user()) }}"><em
                                                class="icon ni ni-user"></em> <span>My Profile</span></a></li>
                                    <li><a href="{{ route('profile.show') }}"><em
                                                class="icon ni ni-setting-alt"></em> <span>Account Settings</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown-content dropdown-content-x-lg py-3">
                                <ul class="link-list">
                                    <li><a class="nav-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><em
                                                class="icon ni ni-signout"></em> <span>Log Out</span></a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div><!-- .nk-header-tools -->
        </div>
    </div>
</div>