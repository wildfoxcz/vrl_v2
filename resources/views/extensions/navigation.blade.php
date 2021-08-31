<!-- mainmenu-->
<nav class="mainmenu">
    <div class="container">
        <!-- Menu-->
        <ul class="sf-menu" id="menu">
            <li class="current">
                <a href="{{ url('/') }}">Úvod</a>
            </li>

            <li>
                <a href="#">Šampionáty</a>
                <div class="sf-mega">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 style="font-family: Segoe UI;"><i class="fa fa-trophy" aria-hidden="true"></i >Assetto Corsa Competizione: <br>
                                &nbsp; &nbsp;&nbsp; Big champ tournament</h5>
                            <ul>
                                <li><a href="table-point.html">Výsledky</a></li>
                                <li><a href="">Závody</a></li>
                                <li><a href="groups.html">Týmy</a></li>
                                <li><a href="news-left-sidebar.html">Novinky</a></li>
                                <li><a href="contact.html">Live Stream</a></li>
                            </ul>
                        </div>

                        <div class="col-md-6">
                            <h5 style="font-family: Segoe UI;"><i class="fa fa-trophy" aria-hidden="true"></i>Formula 1: <br>
                                &nbsp; &nbsp;&nbsp; Season 2020/2021</h5>
                            <ul>
                                <li><a href="table-point.html">Výsledky</a></li>
                                <li><a href="fixtures.html">Závody</a></li>
                                <li><a href="groups.html">Týmy</a></li>
                                <li><a href="news-left-sidebar.html">Novinky</a></li>
                                <li><a href="contact.html">Live Stream</a></li>
                            </ul>
                        </div>

                    </div>
            </li>

            <li class="current">
                <a href="{{ url('/races') }}">Závody</a>
            </li>

            <li class="current">
                <a href="{{ url('/calendar') }}">Kalendář</a>
            </li>

            <li>
                <a href="{{ url('/page/pravidla') }}">Pravidla</a>
            </li>

            <li class="current">
                <a href="#">O nás</a>
                <ul class="sub-current">
                    <li>
                        <a href="{{ url('/page/o-virtual-racing-league') }}">O Virtual Racing League</a>
                    </li>
                    <li>
                        <a href="{{ url('users') }}">Registrovaní jezdci</a>
                    </li>
                </ul>
            </li>
            @guest
                <li>
                    <a href="{{ url('/login') }}">Přihlášení</a>
                </li>
            @endguest
            @auth
                <li>
                    <a href="{{ url('/profile') }}">Můj profil</a>
                </li>

                @if(auth()->user()->isAuthorised('administrator'))
                    <li>
                        <a href="{{ route('admin.index') }}">Administrace</a>
                    </li>
                @endif

                <li>
                    <a href="{{ url('/logout') }}">Odhlásit</a>
                </li>
            @endauth

        </ul>
        <!-- End Menu-->
    </div>
</nav>
<!-- End mainmenu-->
