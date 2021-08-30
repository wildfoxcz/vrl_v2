<!DOCTYPE html>
<html lang="cs">
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="SportsCup - Bootstrap 4 Theme for Soccer And Sports">
    <meta name="author" content="That One Crew">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Theme CSS -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" media="screen">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('img/icons/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/icons/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/icons/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/icons/apple-touch-icon-114x114.png') }}">
</head>

<body>

<!-- layout-->
<div id="layout">
    <!-- Header-->
    <header class="header-2">
        <!-- End headerbox-->
        <div class="headerbox">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <!-- Logo-->
                    <div class="col col-xl-2">
                        <div class="logo">
                            <a href="index.html" title="Return Home">
                                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo_img">
                            </a>
                        </div>
                    </div>
                    <!-- End Logo-->

                    <!-- Nav-->
                    <div class="col col-xl-10">
                        @include('extensions.navigation')
                    </div>
                    <!-- End nav Header-->
                </div>
            </div>
        </div>
        <!-- End headerbox-->
    </header>
    <!-- End Header-->

    <!-- End section-hero-posts-->
    <!-- Section Area - Content Central -->
    <section class="content-info">


        <!-- Content Central -->


                @yield('content')

                @yield('sidebar')

        <!-- End Content Central -->
    </section>
    <!-- End Section Area -  Content Central -->
    <!-- footer-->
    <footer id="footer">
        <!-- Footer Top-->
        <div class="top-footer">

            <!-- Logo Footer-->
            <div class="col-lg-12">
                <div class="logo-footer">
                    <h2>Sociální sítě</h2>
                </div>
            </div>
            <!-- End Logo Footer-->

            <!-- Social Icons-->
            <ul class="social">
                <li>
                    <div>
                        <a href="#" class="facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </div>
                </li>
                <li>
                    <div>
                        <a href="#" class="instagram">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                </li>
                <li>
                    <div>
                        <a href="#" class="youtube">
                            <i class="fa fa-youtube"></i>
                        </a>
                    </div>
                </li>
            </ul>
            <!-- End Social Icons-->
        </div>
        <!-- End Footer Top-->

        <!-- Links Footer-->
        <div class="links-footer">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <p>&copy; 2021 Virtual Racing League. Všechna práva vyhrazena.</p>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Links Footer-->

    </footer>
    <!-- End footer-->
</div>
<!-- End layout-->

<!-- ======================= JQuery libs =========================== -->
<!-- jQuery local-->
<script type="text/javascript" src="{{ asset('assets/js/jquery.js') }}"></script>
<!-- popper.js-->
<script type="text/javascript" src="{{ asset('assets/js/popper.min.js') }}"></script>
<!-- bootstrap.min.js-->
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!-- required-scripts.js-->
<script type="text/javascript" src="{{ asset('assets/js/theme-scripts.js') }}"></script>
<!-- theme-main.js-->
<script type="text/javascript" src="{{ asset('assets/js/theme-main.js') }}"></script>
<!-- ======================= End JQuery libs =========================== -->

</body>
</html>
