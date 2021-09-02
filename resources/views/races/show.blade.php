@extends('multi')

@section('content')
    <!-- Section Title -->
    <div class="section-title single-result" style="background:url({{ asset('img/circuits') }}/{{ $race->circuits->image }})">
        <div class="container">
            <div class="row">
                <!-- Result Location -->
                <div class="col-lg-12">
                    <div class="result-location">
                        <ul>
                            <li>
                                {{ $race->started_at }}
                            </li>

                            <li>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                {{ $race->circuits->name}}
                            </li>
                            <li>Délka : {{ $race->circuits->circuit_length }} km</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Result Location -->

            <!-- Result -->
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="team">
                        <h1><img width="70" height="46" src="{{ asset('img/flags') }}/{{ $race->circuits->country }}.png" alt="club-logo">
                            {{ $race->name }}
                        </h1>
                        <ul>
                            <li style="font-weight: normal; font-style: italic">Nejrýchlejší čas</li>
                            <li>{{ $race->circuits->fastest_time }}</li>
                            <li style="font-weight: normal; font-style: italic">Zatáček</li>
                            <li>{{ $race->circuits->turns }}</li>
                        </ul>
                    </div>
                </div>



            </div>
            <!-- End Result -->

        </div>
    </div>
    <!-- End Section Title -->

    <!-- Section Area - Content Central -->
    <section class="content-info">

        <!-- Single Team Tabs -->
        <div class="single-team-tabs">
            <div class="container">
                <div class="row">
                    <!-- Left Content - Tabs and Carousel -->
                    <div class="col-xl-12 col-md-12">
                        <!-- Nav Tabs -->
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active"><a href="#summary" data-toggle="tab">O Závodu</a></li>
                            <li><a href="#stats" data-toggle="tab">Výsledky</a></li>
                        </ul>
                        <!-- End Nav Tabs -->
                    </div>

                    <div class="col-lg-12">
                        <!-- Content Tabs -->
                        <div class="tab-content">
                            <!-- Tab One - Sumary -->
                            <div class="tab-pane active" id="summary">

                                <div class="panel-box padding-b">
                                    <div class="titles">
                                        <h4>O Závodu</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-4">
                                            <img src="{{ asset('img/clubs-teams/single-team.jpg') }}" alt=""><br><br>
                                            @auth
                                                @if($race->users->contains(auth()->user()))
                                                    Jsi přihlášen v závodu
                                                @else
                                                    <a href="{{ route('races.join', $race) }}" class="btn btn-primary">Přihlásit se do závodu</a>
                                                @endif
                                            @endauth
                                        </div>

                                        <div class="col-lg-12 col-xl-8">
                                            <p>{!! $race->description !!}</p>
                                        </div>
                                    </div>
                                </div>

                                <!--Items Club News -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="clear-title">Match News</h3>
                                    </div>

                                    <!--Item Club News -->
                                    <div class="col-lg-6 col-xl-3">
                                        <!-- Widget Text-->
                                        <div class="panel-box">
                                            <div class="titles no-margin">
                                                <h4><a href="#">World football's dates.</a></h4>
                                            </div>
                                            <a href="#"><img src="img/blog/1.jpg" alt=""></a>
                                            <div class="row">
                                                <div class="info-panel">
                                                    <p>Fans from all around the world can apply for 2018 FIFA World Cup™ tickets as the first window of sales.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Widget Text-->
                                    </div>
                                    <!--End Item Club News -->

                                    <!--Item Club News -->
                                    <div class="col-lg-6 col-xl-3">
                                        <!-- Widget Text-->
                                        <div class="panel-box">
                                            <div class="titles no-margin">
                                                <h4><a href="#">Mbappe’s year to remember</a></h4>
                                            </div>
                                            <a href="#"><img src="img/blog/2.jpg" alt=""></a>
                                            <div class="row">
                                                <div class="info-panel">
                                                    <p>Tickets may be purchased online by using Visa payment cards or Visa Checkout. Visa is the official.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Widget Text-->
                                    </div>
                                    <!--End Item Club News -->

                                    <!--Item Club News -->
                                    <div class="col-lg-6 col-xl-3">
                                        <!-- Widget Text-->
                                        <div class="panel-box">
                                            <div class="titles no-margin">
                                                <h4><a href="#">Egypt are one family</a></h4>
                                            </div>
                                            <a href="#"><img src="img/blog/3.jpg" alt=""></a>
                                            <div class="row">
                                                <div class="info-panel">
                                                    <p>Successful applicants who have applied for supporter tickets and conditional supporter tickets will.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Widget Text-->
                                    </div>
                                    <!--End Item Club News -->

                                    <!--Item Club News -->
                                    <div class="col-lg-6 col-xl-3">
                                        <!-- Widget Text-->
                                        <div class="panel-box">
                                            <div class="titles no-margin">
                                                <h4><a href="#">Egypt are one family</a></h4>
                                            </div>
                                            <a href="#"><img src="img/blog/4.jpg" alt=""></a>
                                            <div class="row">
                                                <div class="info-panel">
                                                    <p>Successful applicants who have applied for supporter tickets and conditional supporter tickets will.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Widget Text-->
                                    </div>
                                    <!--End Item Club News -->

                                </div>
                                <!--End Items Club News -->

                            </div>
                            <!-- Tab One - Sumary -->

                            <!-- Tab Two - stats -->
                            <div class="tab-pane" id="stats">
                                <!-- Result -->
                                <div class="row match-stats">
                                    <div class="col-lg-10">
                                        <div class="team">
                                            <img src="img/clubs-logos/colombia.png" alt="club-logo">
                                            <a href="single-team.html">Colombia</a>
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <div class="result-match">
                                            VS
                                        </div>
                                    </div>

                                    <div class="col-lg-5">
                                        <div class="team right">
                                            <a href="single-team.html">Argentina</a>
                                            <img src="img/clubs-logos/arg.png" alt="club-logo">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <ul>
                                            <li>
                                                <span class="left">58.5</span>
                                                <span class="center">Possession %</span>
                                                <span class="right">40</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Result -->
                            </div>
                            <!-- End Tab Two - stats -->
                        </div>
                        <!-- Content Tabs -->
                    </div>

                </div>
            </div>
        </div>
        <!-- Single Team Tabs -->
    </section>
    <!-- End Section Area -  Content Central -->
@endsection
