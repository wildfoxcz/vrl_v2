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
                            <a href="{{ url('/') }}" title="Return Home">
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

    <!-- section-hero-posts-->
    <div class="hero-header">
        <!-- Hero Slider-->
        <div id="hero-slider" class="hero-slider">
            @foreach ($posts as $post)
            <!-- Item Slide-->
            <div class="item-slider" style="background:url(images/posts/{{ $post->image }});">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div style="padding-top:250px;" class="info-slider">
                                <h1>{{ $post->title }}</h1>
                                <p>{{ $post->short_desc }}</p>
                                <a href="{{ $post->slug }}" class="btn-iw outline">Číst více <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Item Slide-->
            @endforeach


        </div>
        <!-- End Hero Slider-->
    </div>
    <!-- End section-hero-posts-->
    <!-- Section Area - Content Central -->
    <section class="content-info">

        <!-- Dark Home -->
        <div class="dark-home paddings-50-50">
            <div class="container">
                <div class="row">
                    <!-- Club Ranking -->
                    <div class="col-lg-4">
                        <div class="recent-results">
                            <h5><a style="font-family: Segoe UI;" href="group-list.html">Nadcházející události</a></h5>
                            <div class="info-results">
                                <ul>
                                    <li>
                                        <span class="head">
                                            F1: Velká cena Velké Británie<span class="date">27 Čvn 2017</span>
                                        </span>
                                        <div class="goals-result">
                                            <a href="single-team.html">
                                                <img src="img/clubs-logos/por.png" alt="">
                                                Portugal <br>
                                                <a href="#">Zobrazit detaily</a>
                                        </div>
                                    </li>

                                    <li>
                                        <span class="head">
                                            F1: Velká cena Velké Británie<span class="date">27 Čvn 2017</span>
                                        </span>
                                        <div class="goals-result">
                                            <a href="single-team.html">
                                                <img src="img/clubs-logos/por.png" alt="">
                                                Portugal <br>
                                                <a href="#">Zobrazit detaily</a>
                                        </div>
                                    </li>

                                    <li>
                                        <span class="head">
                                            F1: Velká cena Velké Británie<span class="date">27 Čvn 2017</span>
                                        </span>
                                        <div class="goals-result">
                                            <a href="single-team.html">
                                                <img src="img/clubs-logos/por.png" alt="">
                                                Portugal <br>
                                                <a href="#">Zobrazit detaily</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Club Ranking -->

                    <!-- recent-results -->
                    <div class="col-lg-4">
                        <div class="player-ranking">
                            <h5><a style="font-family: Segoe UI; href="group-list.html">Průběžné pořadí jezdců: F1</a></h5>
                            <div class="info-player">
                                <ul>
                                    <li>
                                              <span class="position">
                                                  1
                                              </span>
                                        <a href="single-team.html">
                                            <img src="img/players/1.jpg" alt="">
                                            Hamilton
                                        </a>
                                        <span class="points">
                                                    90
                                                </span>
                                    </li>

                                    <li>
                                              <span class="position">
                                                  2
                                              </span>
                                        <a href="single-team.html">
                                            <img src="img/players/2.jpg" alt="">
                                            Verstappen
                                        </a>
                                        <span class="points">
                                                    88
                                                </span>
                                    </li>

                                    <li>
                                              <span class="position">
                                                  3
                                              </span>
                                        <a href="single-team.html">
                                            <img src="img/players/3.jpg" alt="">
                                            Norris
                                        </a>
                                        <span class="points">
                                                    86
                                                </span>
                                    </li>

                                    <li>
                                              <span class="position">
                                                  4
                                              </span>
                                        <a href="single-team.html">
                                            <img src="img/players/4.jpg" alt="">
                                            Sainz
                                        </a>
                                        <span class="points">
                                                  80
                                               </span>
                                    </li>

                                    <li>
                                              <span class="position">
                                                  5
                                              </span>
                                        <a href="single-team.html">
                                            <img src="img/players/5.jpg" alt="">
                                            Alonso
                                        </a>
                                        <span class="points">
                                                    76
                                                </span>
                                    </li>

                                    <li>
                                              <span class="position">
                                                  6
                                              </span>
                                        <a href="single-team.html">
                                            <img src="img/players/6.jpg" alt="">
                                            Schumacher
                                        </a>
                                        <span class="points">
                                                    74
                                                </span>
                                    </li>

                                    <li>
                                              <span class="position">
                                                  7
                                              </span>
                                        <a href="single-team.html">
                                            <img src="img/players/2.jpg" alt="">
                                            Vettel
                                        </a>
                                        <span class="points">
                                                    70
                                                </span>
                                    </li>

                                    <li>
                                              <span class="position">
                                                  8
                                              </span>
                                        <a href="single-team.html">
                                            <img src="img/players/1.jpg" alt="">
                                            Leclerc
                                        </a>
                                        <span class="points">
                                                    65
                                                </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end recent-results -->

                    <!-- Top player -->
                    <div class="col-lg-4">
                        <div class="player-ranking">
                            <h5><a style="font-family: Segoe UI;" href="group-list.html">Průběžné pořadí jezdců: ACC</a></h5>
                            <div class="info-player">
                                <ul>
                                    <li>
                                              <span class="position">
                                                  1
                                              </span>
                                        <a href="single-team.html">
                                            <img src="img/players/1.jpg" alt="">
                                            Mitchell
                                        </a>
                                        <span class="points">
                                                    90
                                                </span>
                                    </li>

                                    <li>
                                              <span class="position">
                                                  2
                                              </span>
                                        <a href="single-team.html">
                                            <img src="img/players/2.jpg" alt="">
                                            Lind
                                        </a>
                                        <span class="points">
                                                    88
                                                </span>
                                    </li>

                                    <li>
                                              <span class="position">
                                                  3
                                              </span>
                                        <a href="single-team.html">
                                            <img src="img/players/3.jpg" alt="">
                                            Howard
                                        </a>
                                        <span class="points">
                                                    86
                                                </span>
                                    </li>

                                    <li>
                                              <span class="position">
                                                  4
                                              </span>
                                        <a href="single-team.html">
                                            <img src="img/players/4.jpg" alt="">
                                            Igoe
                                        </a>
                                        <span class="points">
                                                  80
                                               </span>
                                    </li>

                                    <li>
                                              <span class="position">
                                                  5
                                              </span>
                                        <a href="single-team.html">
                                            <img src="img/players/5.jpg" alt="">
                                            Balon
                                        </a>
                                        <span class="points">
                                                    76
                                                </span>
                                    </li>

                                    <li>
                                              <span class="position">
                                                  6
                                              </span>
                                        <a href="single-team.html">
                                            <img src="img/players/6.jpg" alt="">
                                            Keen
                                        </a>
                                        <span class="points">
                                                    74
                                                </span>
                                    </li>

                                    <li>
                                              <span class="position">
                                                  7
                                              </span>
                                        <a href="single-team.html">
                                            <img src="img/players/2.jpg" alt="">
                                            Adam
                                        </a>
                                        <span class="points">
                                                    70
                                                </span>
                                    </li>

                                    <li>
                                              <span class="position">
                                                  8
                                              </span>
                                        <a href="single-team.html">
                                            <img src="img/players/1.jpg" alt="">
                                            Loggie
                                        </a>
                                        <span class="points">
                                                    65
                                                </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Top player -->
                </div>
            </div>
        </div>
        <!-- Content Central -->
        <div class="container padding-top">
            <div class="row">

            @yield('content')

            @yield('sidebar')
            </div>
        </div>
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
<script type="text/javascript" src="assets/js/jquery.js"></script>
<!-- popper.js-->
<script type="text/javascript" src="assets/js/popper.min.js"></script>
<!-- bootstrap.min.js-->
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<!-- required-scripts.js-->
<script type="text/javascript" src="assets/js/theme-scripts.js"></script>
<!-- theme-main.js-->
<script type="text/javascript" src="assets/js/theme-main.js"></script>
<!-- ======================= End JQuery libs =========================== -->

</body>
</html>
