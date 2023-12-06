<!DOCTYPE html>
<html lang="en">
<meta name="csrf-token" content="{{ csrf_token() }}">

<head>
    <base href="../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Multi-purpose admin dashboard template that especially build for programmers.">
    <title>Cashless Payment System For School</title>
    <link rel="shortcut icon" href="./images/favicon.png">
    <link rel="stylesheet" href="./assets/css/style.css?v1.1.2">
</head>

<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg">
    <!-- Root  -->
    <div class="nk-app-root">
        <!-- main  -->
        <div class="nk-main">
            <div class="nk-wrap align-items-center justify-content-center has-mask">
                <div class="mask mask-3"></div><!-- .mask-->
                <div class="container p-2 p-sm-4">
                    <div class="row flex-lg-row-reverse">
                        <div class="col-lg-5">
                            <div class="card card-gutter-lg rounded-4 card-auth">
                                <div class="card-body">
                                    <div class="brand-logo mb-4">
                                        <a href="./html/index.html" class="logo-link">
                                            <div class="logo-wrap">
                                                <img class="logo-img logo-light" src="./images/logo.png"
                                                    srcset="./images/logo2x.png 2x" alt="">
                                                <img class="logo-img logo-dark" src="./images/logo-dark.png"
                                                    srcset="./images/logo-dark2x.png 2x" alt="">
                                                <img class="logo-img logo-icon" src="./images/logo-icon.png"
                                                    srcset="./images/logo-icon2x.png 2x" alt="">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title mb-1">Login to Account</h3>
                                            <p class="small">Please sign-in to your account and start the adventure.</p>
                                        </div>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="row gy-3">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email" class="form-label">{{ __('Email Address')
                                                        }}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="email" class="form-control" id="email" name="email"
                                                            placeholder="Enter email">
                                                    </div>
                                                </div><!-- .form-group -->
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="password" class="form-label">{{ __('Password')
                                                        }}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="password" class="form-control" id="password"
                                                            name="password" placeholder="Enter password">
                                                    </div>
                                                </div><!-- .form-group -->
                                            </div>
                                            <div class="col-12">
                                                <div class="d-flex flex-wrap justify-content-between">
                                                    <div class="form-check form-check-sm">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="remember" id="remember" {{ old('remember') ? 'checked'
                                                            : '' }}>
                                                        <label class="form-check-label" for="remember">{{ __('Remember
                                                            Me') }}</label>
                                                    </div>
                                                    @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-primary" type="submit">Login to
                                                        account</button>
                                                </div>
                                            </div>
                                        </div><!-- .row -->
                                    </form>
                                </div><!-- .card-body -->
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-lg-7 align-self-center">
                            <div class="card-body is-theme ps-lg-4 pt-5 pt-lg-0">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="h1 title mb-3">Welcome back to <br> Cashless Payment System For School.</div>
                                        <p>Manage you child's financial with the tip of your fingers.</p>
                                    </div>
                                </div><!-- .row -->
                                <div class="mt-5 pt-4">
                                    <div class="media-group media-group-overlap">
                                        <div class="media media-sm media-circle media-border border-white">
                                            <img src="./images/avatar/a.jpg" alt="">
                                        </div>
                                        <div class="media media-sm media-circle media-border border-white">
                                            <img src="./images/avatar/b.jpg" alt="">
                                        </div>
                                        <div class="media media-sm media-circle media-border border-white">
                                            <img src="./images/avatar/c.jpg" alt="">
                                        </div>
                                        <div class="media media-sm media-circle media-border border-white">
                                            <img src="./images/avatar/d.jpg" alt="">
                                        </div>
                                    </div>
                                    <p class="small mt-2">More than 2k people joined us, it's your turn</p>
                                </div>
                            </div><!-- .card-body -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .container -->
            </div>
        </div> <!-- .nk-main -->
    </div> <!-- .nk-app-root -->
</body>
<!-- JavaScript -->
<script src="./assets/js/bundle.js"></script>
<script src="./assets/js/scripts.js"></script>

</html>